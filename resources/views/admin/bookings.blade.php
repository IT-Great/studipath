@extends('admin.layout')
@section('title', 'Bookings')
@section('content')
<h1>Bookings</h1>

<div class="top">
  <a class="chip {{ request('status') ? '' : 'on' }}" href="{{ route('admin.bookings') }}">All ({{ $counts->sum() }})</a>
  @foreach (\App\Models\Booking::STATUSES as $s)
    <a class="chip {{ request('status') === $s ? 'on' : '' }}" href="{{ route('admin.bookings', ['status' => $s]) }}">{{ ucfirst($s) }} ({{ $counts[$s] ?? 0 }})</a>
  @endforeach
  <form method="GET" style="margin-left:auto">
    <input type="search" name="q" value="{{ request('q') }}" placeholder="Search name, email, school...">
  </form>
  <a class="chip" href="{{ route('admin.bookings.export') }}">Export CSV</a>
</div>

<div class="tw"><table>
<thead><tr><th>Date</th><th>Name</th><th>Contact</th><th>Schedule</th><th>Details</th><th>Status</th></tr></thead>
<tbody>
@forelse ($bookings as $b)
<tr>
  <td>{{ $b->created_at->format('d M Y') }}<br>{{ $b->created_at->format('H:i') }}</td>
  <td><b>{{ $b->name }}</b><br>{{ $b->role }} · {{ $b->grade }}<br>{{ $b->school }}</td>
  <td><a href="https://wa.me/{{ $b->wa_number }}" target="_blank" rel="noopener">{{ $b->whatsapp }}</a><br><a href="mailto:{{ $b->email }}">{{ $b->email }}</a></td>
  <td>{{ $b->mode }}<br>{{ implode(', ', $b->days) }}<br>{{ implode(', ', $b->times) }}</td>
  <td><details><summary>View</summary><dl>
    <dt>City</dt><dd>{{ $b->city }}</dd>
    <dt>Curriculum</dt><dd>{{ $b->curriculum }}</dd>
    <dt>Topics</dt><dd>{{ implode(', ', $b->topics) }}</dd>
    <dt>Country</dt><dd>{{ $b->country }}</dd>
    <dt>Major</dt><dd>{{ $b->major ?: '-' }}</dd>
    <dt>Start year</dt><dd>{{ implode(', ', $b->start_year) }}</dd>
    <dt>Question</dt><dd>{{ $b->question }}</dd>
    <dt>Source</dt><dd>{{ $b->source }}</dd>
  </dl></details></td>
  <td>
    <form method="POST" action="{{ route('admin.bookings.update', $b) }}">
      @csrf @method('PATCH')
      <select name="status" onchange="this.form.submit()">
        @foreach (\App\Models\Booking::STATUSES as $s)
          <option value="{{ $s }}" @selected($b->status === $s)>{{ ucfirst($s) }}</option>
        @endforeach
      </select>
    </form>
  </td>
</tr>
@empty
<tr><td colspan="6">No bookings yet.</td></tr>
@endforelse
</tbody></table></div>

<div class="pg">
  @if ($bookings->previousPageUrl()) <a href="{{ $bookings->previousPageUrl() }}">← Previous</a> @endif
  <span>Page {{ $bookings->currentPage() }} / {{ $bookings->lastPage() }}</span>
  @if ($bookings->nextPageUrl()) <a href="{{ $bookings->nextPageUrl() }}">Next →</a> @endif
</div>
@endsection