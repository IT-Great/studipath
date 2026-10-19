<?php
namespace App\Services;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VisitLogger
{
    public static function record(Request $r, string $type, ?string $event = null, array $extra = []): void
    {
        try {
            if (self::ignore($r)) return;

            $ua  = (string) $r->userAgent();
            $ref = $extra['referrer'] ?? (parse_url((string) $r->headers->get('referer'), PHP_URL_HOST) ?: null);
            if ($ref === $r->getHost()) $ref = null;
            if ($ref === $r->getHost()) $ref = null;

            $cc = strtoupper((string) $r->header('CF-IPCountry'));   // hanya ada jika memakai Cloudflare
            $cc = preg_match('/^[A-Z]{2}$/', $cc) && ! in_array($cc, ['XX', 'T1'], true) ? $cc : null;

            Visit::create([
                'type'         => $type,
                'event'        => $event,
                'visitor'      => substr(hash('sha256', $r->ip().'|'.$ua.'|'.today()->toDateString().'|'.config('app.key')), 0, 32),
                'referrer'     => $type === 'view' && $ref ? Str::limit($ref, 150, '') : null,
                'utm_source'   => $type === 'view' ? ($extra['utm_source']   ?? self::q($r, 'utm_source'))   : null,
                'utm_medium'   => $type === 'view' ? ($extra['utm_medium']   ?? self::q($r, 'utm_medium'))   : null,
                'utm_campaign' => $type === 'view' ? ($extra['utm_campaign'] ?? self::q($r, 'utm_campaign')) : null,
                'device'       => self::device($ua),
                'browser'      => self::browser($ua),
                'os'           => self::os($ua),
                'country'      => $cc,
                'created_at'   => now(),
            ]);
        } catch (\Throwable $e) {
            report($e);   // pelacakan tidak boleh merusak halaman
        }
    }

    private static function ignore(Request $r): bool
    {
        $ua = (string) $r->userAgent();
        if ($ua === '' || preg_match('/bot|crawl|spider|slurp|preview|monitor|uptime|lighthouse|pingdom|gtmetrix|curl|wget|python|httpclient|headless|facebookexternalhit/i', $ua)) return true;
        if ($r->session()->get('admin_auth')) return true;                   // kunjungan admin tidak dihitung
        if ($r->headers->get('Purpose') === 'prefetch' || $r->headers->has('Sec-Purpose')) return true;
        if ($r->header('DNT') === '1') return true;                          // hormati "Do Not Track"
        return false;
    }

    private static function q(Request $r, string $key): ?string
    {
        $v = trim((string) $r->query($key));
        return $v === '' ? null : Str::limit($v, 80, '');
    }

    private static function device(string $ua): string
    {
        if (preg_match('/ipad|tablet|kindle|silk/i', $ua)) return 'Tablet';
        if (preg_match('/android/i', $ua) && ! preg_match('/mobi/i', $ua)) return 'Tablet';
        if (preg_match('/mobi|android|iphone|ipod/i', $ua)) return 'Mobile';
        return 'Desktop';
    }

    private static function browser(string $ua): string
    {
        return match (true) {
            (bool) preg_match('/Instagram/i', $ua)        => 'Instagram app',
            (bool) preg_match('/FBAN|FBAV/i', $ua)        => 'Facebook app',
            (bool) preg_match('/Edg/i', $ua)              => 'Edge',
            (bool) preg_match('/OPR|Opera/i', $ua)        => 'Opera',
            (bool) preg_match('/SamsungBrowser/i', $ua)   => 'Samsung Internet',
            (bool) preg_match('/Firefox|FxiOS/i', $ua)    => 'Firefox',
            (bool) preg_match('/Chrome|CriOS/i', $ua)     => 'Chrome',
            (bool) preg_match('/Safari/i', $ua)           => 'Safari',
            default                                       => 'Other',
        };
    }

    private static function os(string $ua): string
    {
        return match (true) {
            (bool) preg_match('/Windows/i', $ua)               => 'Windows',
            (bool) preg_match('/Android/i', $ua)               => 'Android',
            (bool) preg_match('/iPhone|iPad|iPod/i', $ua)      => 'iOS',
            (bool) preg_match('/Mac OS X|Macintosh/i', $ua)    => 'macOS',
            (bool) preg_match('/Linux/i', $ua)                 => 'Linux',
            default                                            => 'Other',
        };
    }
}