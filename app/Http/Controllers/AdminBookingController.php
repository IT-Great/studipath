<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index(Request $r)
    {
        $q = Booking::query()->latest();
        if ($r->filled('status')) $q->where('status', $r->status);
        if ($s = trim((string) $r->get('q'))) {
            $q->where(fn ($x) => $x->where('name', 'like', "%$s%")
                ->orWhere('email', 'like', "%$s%")
                ->orWhere('whatsapp', 'like', "%$s%")
                ->orWhere('school', 'like', "%$s%"));
        }
        return view('admin.bookings', [
            'bookings' => $q->paginate(20)->withQueryString(),
            'counts'   => Booking::selectRaw('status, count(*) c')->groupBy('status')->pluck('c', 'status'),
        ]);
    }

    public function update(Request $r, Booking $booking)
    {
        $booking->update($r->validate(['status' => 'required|in:'.implode(',', Booking::STATUSES)]));
        return back();
    }

    public function export()
    {
        $name = 'bookings-'.now()->format('Ymd-His').'.csv';
        return response()->streamDownload(function () {
            $out = fopen('php://output', 'w');
            fwrite($out, "\xEF\xBB\xBF"); // agar Excel membaca UTF-8 dengan benar
            fputcsv($out, ['Date','Name','Email','WhatsApp','City','Role','Grade','School','Curriculum','Topics','Country','Major','Start year','Question','Mode','Days','Times','Source','Status'], ',', '"', '');
            Booking::latest()->chunk(200, function ($rows) use ($out) {
                foreach ($rows as $b) {
                    fputcsv($out, array_map([self::class, 'safe'], [
                        $b->created_at, $b->name, $b->email, $b->whatsapp, $b->city, $b->role, $b->grade,
                        $b->school, $b->curriculum, implode(', ', $b->topics), $b->country, $b->major,
                        implode(', ', $b->start_year), $b->question, $b->mode, implode(', ', $b->days),
                        implode(', ', $b->times), $b->source, $b->status,
                    ]), ',', '"', '');
                }
            });
            fclose($out);
        }, $name, ['Content-Type' => 'text/csv']);
    }

    // mencegah CSV injection (sel yang diawali = + - @ dibaca Excel sebagai rumus)
    public static function safe($v): string
    {
        $v = (string) $v;
        return preg_match('/^[=+\-@\t\r]/', $v) ? "'".$v : $v;
    }
}