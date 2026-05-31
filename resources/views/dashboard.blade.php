@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <div class="page-title">
        <h2>Dashboard</h2>
    </div>
</div>

<div class="stats-container">
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-users"></i></div>
        <div class="stat-info">
            <h3>{{ \App\Models\Guest::count() }}</h3>
            <p>Total Tamu</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-envelope"></i></div>
        <div class="stat-info">
            <h3>{{ \App\Models\Invitation::count() }}</h3>
            <p>Undangan Terkirim</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon pink"><i class="fas fa-calendar-alt"></i></div>
        <div class="stat-info">
            <h3>{{ \App\Models\Event::count() }}</h3>
            <p>Acara Terdaftar</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon gray"><i class="fas fa-clipboard-list"></i></div>
        <div class="stat-info">
            <h3>{{ \App\Models\Attendance::count() }}</h3>
            <p>Total Kehadiran</p>
        </div>
    </div>
</div>
@endsection
