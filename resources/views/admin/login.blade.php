<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>Admin Login | StudiPath</title>
<link rel="icon" type="image/png" href="{{ asset('images/logofix.png') }}">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@600;800;900&family=Plus+Jakarta+Sans:wght@400;500;700&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box}
body{margin:0;min-height:100svh;display:grid;place-items:center;padding:24px;font-family:"Plus Jakarta Sans",system-ui,sans-serif;color:#5E2614;
  background:radial-gradient(circle at 85% 10%,#FDE3CC,transparent 45%),radial-gradient(circle at 10% 90%,#FDE3CC,transparent 45%),#FDF8F3}
.card{width:min(420px,100%);background:#fff;border:1px solid rgba(94,38,20,.14);border-radius:32px;padding:clamp(26px,5vw,42px);box-shadow:0 24px 60px rgba(94,38,20,.15)}
.logo{display:block;height:84px;width:auto;margin:0 auto 6px}
h1{font-family:Outfit,sans-serif;font-weight:900;font-size:1.8rem;text-align:center;margin:0 0 4px}
.sub{text-align:center;color:#7d5a4b;margin:0 0 24px;font-size:.95rem}
label{display:block;font-weight:700;font-size:.9rem;margin:16px 0 6px}
.field{position:relative}
input{width:100%;padding:14px 16px;border-radius:14px;border:1.5px solid rgba(94,38,20,.2);background:#FDF8F3;color:#5E2614;font:inherit;transition:border-color .2s,box-shadow .2s}
input:focus{outline:0;border-color:#F26B1D;box-shadow:0 0 0 4px rgba(242,107,29,.18)}
.eye{position:absolute;right:6px;top:50%;transform:translateY(-50%);border:0;background:none;cursor:pointer;color:#7d5a4b;width:40px;height:40px;border-radius:10px}
.eye:hover{color:#F26B1D}
.eye svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
.err{background:#fdecea;color:#b3261e;border-radius:12px;padding:11px 14px;font-size:.9rem;font-weight:600;margin-bottom:6px}
button.go{width:100%;margin-top:24px;padding:15px;border:0;border-radius:999px;background:#F26B1D;color:#fff;font:inherit;font-weight:700;font-size:1.02rem;cursor:pointer;transition:transform .2s,box-shadow .2s}
button.go:hover{transform:translateY(-2px);box-shadow:0 10px 24px rgba(242,107,29,.4)}
.back{display:block;text-align:center;margin-top:20px;color:#F26B1D;font-weight:700;font-size:.9rem;text-decoration:none}
.back:hover{text-decoration:underline}
</style>
</head>
<body>
<main class="card">
  <img class="logo" src="{{ asset('images/logofix.png') }}" alt="StudiPath">
  <h1>Admin Login</h1>
  <p class="sub">Sign in to manage consultation bookings.</p>

  <form method="POST" action="{{ route('login.attempt') }}">
    @csrf
    @error('username')<div class="err" role="alert">{{ $message }}</div>@enderror

    <label for="username">Username</label>
    <input id="username" name="username" type="text" value="{{ old('username') }}" autocomplete="username" autofocus required>

    <label for="password">Password</label>
    <div class="field">
      <input id="password" name="password" type="password" autocomplete="current-password" required>
      <button class="eye" type="button" id="eye" aria-label="Show password">
        <svg viewBox="0 0 24 24"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
      </button>
    </div>

    <button class="go" type="submit">Sign in</button>
  </form>
  <a class="back" href="{{ route('home') }}">← Back to website</a>
</main>
<script>
document.getElementById('eye').addEventListener('click',function(){
  var i=document.getElementById('password'),show=i.type==='password';
  i.type=show?'text':'password';
  this.setAttribute('aria-label',show?'Hide password':'Show password');
});
</script>
</body>
</html>