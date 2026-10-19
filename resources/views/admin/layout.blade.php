<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>@yield('title', 'Dashboard') | StudiPath Admin</title>
<link rel="icon" type="image/png" href="{{ asset('images/logofix.png') }}">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@600;800;900&family=Plus+Jakarta+Sans:wght@400;500;700&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box}
body{margin:0;background:#FDF8F3;color:#5E2614;font-family:"Plus Jakarta Sans",system-ui,sans-serif}
a{color:#F26B1D}
h1,h2,h3{font-family:Outfit,sans-serif;margin:0}
.bar{position:sticky;top:0;z-index:5;background:rgba(253,248,243,.9);backdrop-filter:blur(10px);border-bottom:1px solid #eadccf}
.bar .in{max-width:1250px;margin:auto;padding:10px 24px;display:flex;align-items:center;gap:8px;flex-wrap:wrap}
.bar img{height:48px;width:auto;margin-right:10px}
.bar nav{display:flex;gap:6px;flex-wrap:wrap}
.bar nav a,.bar .out{padding:8px 16px;border-radius:99px;text-decoration:none;color:#5E2614;font-weight:700;font-size:.92rem;border:0;background:none;cursor:pointer;font-family:inherit}
.bar nav a:hover,.bar .out:hover{background:#FDE3CC}
.bar nav a.on{background:#F26B1D;color:#fff}
.sp{flex:1}
.w{max-width:1250px;margin:auto;padding:28px 24px 60px}
.w>h1{font-size:2rem;font-weight:900;margin-bottom:4px}
.hint{color:#7d5a4b;margin:0 0 22px}

/* dashboard */
.stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-bottom:22px}
.stat{background:#fff;border:1px solid #eadccf;border-radius:22px;padding:20px 22px}
.stat span{display:block;color:#7d5a4b;font-weight:600;font-size:.88rem}
.stat b{display:block;font-family:Outfit;font-size:2.4rem;font-weight:900;line-height:1.1;margin-top:6px}
.stat.hot{background:linear-gradient(135deg,#F26B1D,#F9A825);border:0;color:#3b150a}
.stat.hot span{color:#3b150a}
.grid2{display:grid;grid-template-columns:2fr 1fr;gap:16px;margin-bottom:22px}
@media(max-width:860px){.grid2{grid-template-columns:1fr}}
.panel{background:#fff;border:1px solid #eadccf;border-radius:22px;padding:22px}
.panel h2{font-size:1.1rem;font-weight:800;margin-bottom:16px}
.chart{display:flex;align-items:flex-end;gap:6px;height:180px}
.col{flex:1;display:flex;flex-direction:column;justify-content:flex-end;align-items:center;height:100%;min-width:0}
.col i{display:block;width:100%;max-width:34px;min-height:3px;border-radius:8px 8px 3px 3px;background:linear-gradient(#F9A825,#F26B1D)}
.col small{margin-top:6px;font-size:.62rem;color:#7d5a4b;white-space:nowrap}
.col em{font-style:normal;font-size:.72rem;font-weight:700;margin-bottom:4px}
.sl{list-style:none;margin:0;padding:0}
.sl li{display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px dashed #eadccf;font-weight:600}
.sl li:last-child{border:0}
.sl b{font-family:Outfit}
.badge{display:inline-block;padding:3px 12px;border-radius:99px;font-size:.78rem;font-weight:700;background:#FDE3CC}
.badge.new{background:#F26B1D;color:#fff}.badge.contacted{background:#fff3cd}.badge.scheduled{background:#d7ecff}.badge.done{background:#d9f5df}.badge.cancelled{background:#eee;color:#777}

/* bookings list */
.top{display:flex;gap:10px;flex-wrap:wrap;align-items:center;margin:14px 0}
.chip{padding:6px 14px;border-radius:99px;background:#fff;border:1px solid #e7d3c4;text-decoration:none;color:inherit;font-weight:600;font-size:14px}
.chip.on{background:#F26B1D;color:#fff;border-color:#F26B1D}
input[type=search]{padding:8px 14px;border-radius:99px;border:1px solid #e7d3c4;min-width:220px;font-family:inherit}
.tw{overflow-x:auto;border-radius:16px;background:#fff;border:1px solid #eadccf}
table{width:100%;border-collapse:collapse}
th,td{padding:10px 14px;text-align:left;border-bottom:1px solid #f0e2d6;vertical-align:top;font-size:14px}
th{background:#FDE3CC;white-space:nowrap}
tr:last-child td{border-bottom:0}
summary{cursor:pointer;color:#F26B1D;font-weight:600}
dl{margin:8px 0 0;display:grid;grid-template-columns:110px 1fr;gap:4px 12px}
dt{font-weight:700}dd{margin:0}
.pg{display:flex;gap:16px;margin-top:16px;justify-content:center}
select{font-family:inherit;padding:6px 10px;border-radius:10px;border:1px solid #e7d3c4}
.stat small{color:#7d5a4b;font-weight:600}
.grid3{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px}
.panel h2 .lg{float:right;font-family:"Plus Jakarta Sans",sans-serif;font-size:.78rem;font-weight:600;color:#7d5a4b}
.lg i{display:inline-block;width:10px;height:10px;border-radius:3px;margin:0 4px 0 12px;vertical-align:-1px}
.lg i.a,.pair i.a{background:linear-gradient(#F9A825,#F26B1D)}
.lg i.b,.pair i.b{background:#E9CDBA}
.vchart{display:flex;align-items:flex-end;gap:4px;height:210px}
.vcol{flex:1;min-width:0;display:flex;flex-direction:column;align-items:center}
.pair{display:flex;align-items:flex-end;justify-content:center;gap:2px;width:100%;height:170px}
.pair i{display:block;flex:1;max-width:16px;min-height:0;border-radius:6px 6px 2px 2px}
.vcol small{margin-top:6px;font-size:.6rem;color:#7d5a4b;white-space:nowrap}
.row{position:relative;display:flex;justify-content:space-between;gap:12px;padding:9px 12px;margin-bottom:6px;border-radius:10px;overflow:hidden;font-weight:600;font-size:.92rem}
.row .b{position:absolute;inset:0 auto 0 0;background:#FDE3CC}
.row .t,.row .n{position:relative}
.row .n{font-family:Outfit,sans-serif;font-weight:800}
</style>
</head>
<body>
<header class="bar"><div class="in">
  <img src="{{ asset('images/logofix.png') }}" alt="StudiPath">
  <nav>
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'on' : '' }}">Dashboard</a>
    <a href="{{ route('admin.bookings') }}" class="{{ request()->routeIs('admin.bookings*') ? 'on' : '' }}">Bookings</a>
    <a href="{{ route('admin.visitors') }}" class="{{ request()->routeIs('admin.visitors') ? 'on' : '' }}">Visitors</a>
    <a href="{{ route('home') }}" target="_blank" rel="noopener">View website ↗</a>
  </nav>
  <span class="sp"></span>
  <form method="POST" action="{{ route('logout') }}">@csrf<button class="out" type="submit">Sign out</button></form>
</div></header>

<main class="w">
  @yield('content')
</main>
</body>
</html>