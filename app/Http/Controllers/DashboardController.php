<?php
namespace App\Http\Controllers;

use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => Booking::count(),
            'new'   => Booking::where('status', 'new')->count(),
            'today' => Booking::whereDate('created_at', today())->count(),
            'week'  => Booking::where('created_at', '>=', today()->subDays(6))->count(),
        ];

        // 14 hari terakhir
        $raw = Booking::where('created_at', '>=', today()->subDays(13))->get(['created_at'])
            ->groupBy(fn ($b) => $b->created_at->format('Y-m-d'))->map->count();

        $series = collect(range(13, 0))->map(function ($i) use ($raw) {
            $d = today()->subDays($i);
            return ['label' => $d->format('d M'), 'n' => $raw[$d->format('Y-m-d')] ?? 0];
        });

        return view('admin.dashboard', [
            'stats'    => $stats,
            'series'   => $series,
            'max'      => max(1, $series->max('n')),
            'statuses' => Booking::selectRaw('status, count(*) c')->groupBy('status')->pluck('c', 'status'),
            'latest'   => Booking::latest()->take(6)->get(),
        ]);
    }
}