@extends('layouts.app')

@section('title', 'Log Kehadiran')

@section('content')
<div class="page-header">
    <div class="page-title">
        <h2>Log Kehadiran Tamu</h2>
    </div>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Tamu</th>
                    <th>Acara</th>
                    <th>Waktu Kehadiran</th>
                    <th>Metode</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->guest->name }}</td>
                    <td>{{ $attendance->event->name }}</td>
                    <td>{{ $attendance->time }}</td>
                    <td><span class="badge badge-primary">{{ $attendance->method }}</span></td>
                    <td>
                        @if($attendance->status === 'Check In')
                            <span class="badge badge-success">Check In</span>
                        @else
                            <span class="badge badge-warning">{{ $attendance->status }}</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
