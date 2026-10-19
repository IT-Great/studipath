@extends('admin.layout')
@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>
<p class="hint">Overview of consultation bookings.</p>

<div class="stats">
  <div class="stat hot"><span>New (not contacted yet)</span><b>{{ $stats['new'] }}</b></div>
  <div class="stat"><span>Today</span><b>{{ $stats['today'] }}</b></div>
  <div class="stat"><span>Last 7 days</span><b>{{ $stats['week'] }}</b></div>
  <div class="stat"><span>All bookings</span><b>{{ $stats['total'] }}</b></div>
</div>

<div class="grid2">
  <section class="panel">
    <h2>Bookings, last 14 days</h2>
    <div class="chart" role="img" aria-label="Bookings per day for the last 14 days">
      @foreach ($series as $d)
        <div class="col">
          @if ($d['n'])<em>{{ $d['n'] }}</em>@endif
          <i style="height:{{ $d['n'] ? max(6, round($d['n'] / $max * 82)) : 0 }}%"></i>
          <small>{{ $d['label'] }}</small>
        </div>
      @endforeach
    </div>
  </section>

  <section class="panel">
    <h2>By status</h2>
    <ul class="sl">
      @foreach (\App\Models\Booking::STATUSES as $s)
        <li><span class="badge {{ $s }}">{{ ucfirst($s) }}</span><b>{{ $statuses[$s] ?? 0 }}</b></li>
      @endforeach
    </ul>
  </section>
</div>

<section class="panel">
  <h2>Latest bookings</h2>
  <div class="tw"><table>
    <thead><tr><th>Date</th><th>Name</th><th>Contact</th><th>Mode</th><th>Status</th></tr></thead>
    <tbody>
    @forelse ($latest as $b)
      <tr>
        <td>{{ $b->created_at->format('d M Y, H:i') }}</td>
        <td><b>{{ $b->name }}</b><br>{{ $b->role }} · {{ $b->school }}</td>
        <td><a href="https://wa.me/{{ $b->wa_number }}" target="_blank" rel="noopener">{{ $b->whatsapp }}</a><br>{{ $b->email }}</td>
        <td>{{ $b->mode }}</td>
        <td><span class="badge {{ $b->status }}">{{ ucfirst($b->status) }}</span></td>
      </tr>
    @empty
      <tr><td colspan="5">No bookings yet.</td></tr>
    @endforelse
    </tbody>
  </table></div>
  <p style="margin:16px 0 0"><a href="{{ route('admin.bookings') }}"><b>View all bookings →</b></a></p>
</section>
@endsection