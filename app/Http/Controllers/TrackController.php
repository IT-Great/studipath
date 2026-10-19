<?php
namespace App\Http\Controllers;

use App\Services\VisitLogger;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function event(Request $request)
    {
        $d = $request->validate([
            'event'        => ['required', 'in:pageview,click_whatsapp,click_instagram,click_threads,click_email'],
            'ref'          => ['nullable', 'string', 'max:300'],
            'utm_source'   => ['nullable', 'string', 'max:80'],
            'utm_medium'   => ['nullable', 'string', 'max:80'],
            'utm_campaign' => ['nullable', 'string', 'max:80'],
        ]);

        if ($d['event'] === 'pageview') {
            $host = parse_url((string) ($d['ref'] ?? ''), PHP_URL_HOST) ?: null;
            if ($host === $request->getHost()) $host = null;

            VisitLogger::record($request, 'view', null, [
                'referrer'     => $host,
                'utm_source'   => $d['utm_source'] ?? null,
                'utm_medium'   => $d['utm_medium'] ?? null,
                'utm_campaign' => $d['utm_campaign'] ?? null,
            ]);
        } else {
            VisitLogger::record($request, 'event', $d['event']);
        }

        return response()->noContent();
    }
}