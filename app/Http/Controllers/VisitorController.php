<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index(Request $r)
    {
        $days = in_array((int) $r->days, [7, 14, 30, 90], true) ? (int) $r->days : 30;
        $from = today()->subDays($days - 1);

        $views = fn () => Visit::where('type', 'view')->where('created_at', '>=', $from);

        $stats = [
            'views'    => $views()->count(),
            'visitors' => $views()->distinct()->count('visitor'),
            'today_v'  => Visit::where('type', 'view')->where('created_at', '>=', today())->count(),
            'today_u'  => Visit::where('type', 'view')->where('created_at', '>=', today())->distinct()->count('visitor'),
            'bookings' => Booking::where('created_at', '>=', $from)->count(),
        ];
        $conv = $stats['visitors'] ? round($stats['bookings'] / $stats['visitors'] * 100, 1) : null;

        // grafik harian
        $rows = $views()->selectRaw('DATE(created_at) as d, count(*) as v, count(distinct visitor) as u')
            ->groupBy('d')->get()->keyBy('d');
        $series = collect(range($days - 1, 0))->map(function ($i) use ($rows) {
            $d = today()->subDays($i);
            $x = $rows[$d->toDateString()] ?? null;
            return ['label' => $d->format('d M'), 'v' => (int) ($x->v ?? 0), 'u' => (int) ($x->u ?? 0)];
        });
        $max = max(1, $series->max('v'));

        // daftar peringkat
        $lists = [
            'Traffic sources'  => $this->top($views(), 'referrer', 'Direct'),
            'Devices'          => $this->top($views(), 'device'),
            'Browsers'         => $this->top($views(), 'browser'),
            'Operating systems'=> $this->top($views(), 'os'),
        ];

        $utm = $this->top($views()->whereNotNull('utm_source'), 'utm_source');
        if ($utm->isNotEmpty()) $lists['Campaigns (utm_source)'] = $utm;

        $countries = $this->top($views()->whereNotNull('country'), 'country')->map(fn ($x) => [
            'k' => class_exists(\Locale::class) ? \Locale::getDisplayRegion('-'.$x['k'], 'en') : $x['k'],
            'c' => $x['c'],
        ]);
        if ($countries->isNotEmpty()) $lists['Countries'] = $countries;

        $labels = [
            'click_whatsapp'  => 'WhatsApp clicks',
            'click_instagram' => 'Instagram clicks',
            'click_threads'   => 'Threads clicks',
            'click_email'     => 'Email clicks',
        ];
        $lists['Contact link clicks'] = Visit::where('type', 'event')->where('created_at', '>=', $from)
            ->selectRaw('event as k, count(*) as c')->groupBy('event')->orderByDesc('c')->get()
            ->map(fn ($x) => ['k' => $labels[$x->k] ?? $x->k, 'c' => (int) $x->c]);

        return view('admin.visitors', compact('days', 'stats', 'conv', 'series', 'max', 'lists'));
    }

    private function top($query, string $col, string $empty = 'Unknown')
    {
        return $query->selectRaw("$col as k, count(*) as c")
            ->groupBy($col)->orderByDesc('c')->limit(8)->get()
            ->map(fn ($x) => ['k' => $x->k ?: $empty, 'c' => (int) $x->c]);
    }
}