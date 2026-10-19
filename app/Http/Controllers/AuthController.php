<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    public function show()
    {
        return session('admin_auth') ? redirect()->route('admin.dashboard') : view('admin.login');
    }

    public function login(Request $request)
    {
        $key = 'admin-login:'.$request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $s = RateLimiter::availableIn($key);
            return back()->withErrors(['username' => "Too many attempts. Please try again in {$s} seconds."])->onlyInput('username');
        }

        $data = $request->validate([
            'username' => ['required', 'string', 'max:150'],
            'password' => ['required', 'string', 'max:200'],
        ]);

        $okUser = hash_equals((string) config('studipath.admin_user'), trim($data['username']));
        $okPass = hash_equals((string) config('studipath.admin_pass'), $data['password']);

        if (! ($okUser && $okPass)) {
            RateLimiter::hit($key, 300); // blokir 5 menit setelah 5 kali salah
            return back()->withErrors(['username' => 'Incorrect username or password.'])->onlyInput('username');
        }

        RateLimiter::clear($key);
        $request->session()->regenerate();      // mencegah session fixation
        $request->session()->put('admin_auth', true);

        return redirect()->intended(route('admin.dashboard'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_auth');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}