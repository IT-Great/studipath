<?php
namespace App\Services;

use App\Models\Booking;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppNotifier
{
    public static function newBooking(Booking $b): void
    {
        $c  = (array) config('studipath.wa');
        $to = self::number((string) ($c['admin'] ?? ''));

        if ($to === '') {
            Log::warning('WhatsApp notification skipped: WA_ADMIN_NUMBER is empty.');
            return;
        }

        try {
            $ok = ($c['driver'] ?? 'fonnte') === 'meta'
                ? self::viaMeta($c, $to, $b)
                : self::viaFonnte($c, $to, $b);

            if ($ok) {
                $b->forceFill(['notified_at' => now()])->save();
            }
        } catch (\Throwable $e) {
            Log::error('WhatsApp notification failed: '.$e->getMessage());
        }
    }

    // Template pesan (gateway)
    private static function text(Booking $b): string
    {
        $list = fn ($a) => implode(', ', (array) $a);

        return implode("\n", [
            "*{$b->name}*",
            "{$b->role} · {$b->school} telah mengirimkan *Book Consultation*.",
            '',
            "WhatsApp: {$b->whatsapp}",
            "Email: {$b->email}",
            "Mode: {$b->mode}",
            'Hari: '.$list($b->days),
            'Jam: '.$list($b->times),
            "Negara tujuan: {$b->country}",
            'Topik: '.$list($b->topics),
            '',
            "Balas: https://wa.me/{$b->wa_number}",
            'Dashboard: '.url('/admin/bookings'),
        ]);
    }

    private static function viaFonnte(array $c, string $to, Booking $b): bool
    {
        $r = Http::timeout(10)
            ->withHeaders(['Authorization' => (string) ($c['fonnte_token'] ?? '')])
            ->asForm()
            ->post('https://api.fonnte.com/send', [
                'target'  => $to,
                'message' => self::text($b),
            ]);

        $ok = $r->successful() && (bool) $r->json('status');
        if (! $ok) Log::warning('Fonnte rejected the message: '.$r->body());
        return $ok;
    }

    // Meta Cloud API: wajib template yang sudah disetujui
    private static function viaMeta(array $c, string $to, Booking $b): bool
    {
        $schedule = $b->mode.', '.implode('/', (array) $b->days).', '.implode('/', (array) $b->times);
        $p = fn ($v) => ['type' => 'text', 'text' => self::clean((string) $v)];

        $r = Http::timeout(10)
            ->withToken((string) ($c['meta_token'] ?? ''))
            ->post('https://graph.facebook.com/v21.0/'.($c['meta_phone_id'] ?? '').'/messages', [
                'messaging_product' => 'whatsapp',
                'to'                => $to,
                'type'              => 'template',
                'template'          => [
                    'name'     => $c['meta_template'] ?? 'new_booking',
                    'language' => ['code' => $c['meta_lang'] ?? 'id'],
                    'components' => [[
                        'type'       => 'body',
                        'parameters' => [$p($b->name), $p($b->role), $p($b->school), $p($b->whatsapp), $p($schedule)],
                    ]],
                ],
            ]);

        if (! $r->successful()) Log::warning('Meta WhatsApp API error: '.$r->body());
        return $r->successful();
    }

    // Meta melarang baris baru, tab, dan spasi berderet pada isi variabel
    private static function clean(string $v): string
    {
        return trim(preg_replace('/\s+/', ' ', $v)) ?: '-';
    }

    private static function number(string $n): string
    {
        $n = preg_replace('/\D/', '', $n);
        return str_starts_with($n, '0') ? '62'.substr($n, 1) : $n;
    }
}