@extends('admin.layout')
@section('title', 'Visitors')

@section('content')
<h1>Visitors</h1>
<p class="hint">Anonymous website traffic. No cookies, no IP addresses stored.</p>

<div class="top">
  @foreach ([7, 14, 30, 90] as $d)
    <a class="chip {{ $days === $d ? 'on' : '' }}" href="{{ route('admin.visitors', ['days' => $d]) }}">Last {{ $d }} days</a>
  @endforeach
</div>

<div class="stats">
  <div class="stat hot"><span>Visitors</span><b>{{ number_format($stats['visitors']) }}</b></div>
  <div class="stat"><span>Page views</span><b>{{ number_format($stats['views']) }}</b></div>
  <div class="stat"><span>Today (visitors / views)</span><b>{{ $stats['today_u'] }} / {{ $stats['today_v'] }}</b></div>
  <div class="stat"><span>Bookings</span><b>{{ $stats['bookings'] }}</b><small>{{ $conv !== null ? $conv.'% of visitors' : 'No visitor data yet' }}</small></div>
</div>

<section class="panel" style="margin-bottom:16px">
  <h2>Traffic per day
    <span class="lg"><i class="a"></i>Visitors <i class="b"></i>Page views</span>
  </h2>
  <div class="vchart" role="img" aria-label="Visitors and page views per day">
    @foreach ($series as $d)
      <div class="vcol" title="{{ $d['label'] }}: {{ $d['u'] }} visitors, {{ $d['v'] }} views">
        <div class="pair">
          <i class="a" style="height:{{ $d['u'] ? max(3, round($d['u'] / $max * 100)) : 0 }}%"></i>
          <i class="b" style="height:{{ $d['v'] ? max(3, round($d['v'] / $max * 100)) : 0 }}%"></i>
        </div>
        @if ($days <= 31)<small>{{ $d['label'] }}</small>@endif
      </div>
    @endforeach
  </div>
</section>

<div class="grid3">
  @foreach ($lists as $title => $rows)
    <section class="panel">
      <h2>{{ $title }}</h2>
      @forelse ($rows as $r)
        <div class="row">
          <span class="b" style="width:{{ round($r['c'] / $rows->max('c') * 100) }}%"></span>
          <span class="t">{{ $r['k'] }}</span><span class="n">{{ $r['c'] }}</span>
        </div>
      @empty
        <p class="hint" style="margin:0">No data yet.</p>
      @endforelse
    </section>
  @endforeach
</div>

<p class="hint" style="margin-top:22px">
  Visitors are counted per day, so the same person returning on another day is counted again.
  Bots, your own admin visits and browsers with "Do Not Track" turned on are excluded.
</p>
@endsection