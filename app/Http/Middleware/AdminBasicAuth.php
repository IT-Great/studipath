<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminBasicAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = (string) config('studipath.admin_user');
        $pass = (string) config('studipath.admin_pass');
        abort_if($user === '' || $pass === '', 503, 'Admin credentials are not configured.');

        $okUser = hash_equals($user, (string) $request->getUser());
        $okPass = hash_equals($pass, (string) $request->getPassword());

        if (! ($okUser && $okPass)) {
            return response('Unauthorized', 401, ['WWW-Authenticate' => 'Basic realm="StudiPath Admin"']);
        }
        return $next($request);
    }
}