<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->get('admin_auth')) {
            return redirect()->guest(route('login'));
        }

        $response = $next($request);
        // agar tombol Back di browser tidak menampilkan halaman admin setelah logout
        $response->headers->set('Cache-Control', 'no-store, private');
        return $response;
    }
}