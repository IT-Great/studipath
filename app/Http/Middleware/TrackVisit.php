<?php
namespace App\Http\Middleware;

use App\Services\VisitLogger;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->isMethod('GET') && $response->getStatusCode() === 200) {
            VisitLogger::record($request, 'view');
        }
        return $response;
    }
}