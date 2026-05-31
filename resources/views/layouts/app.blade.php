<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Buku Tamu Digital')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        {{-- Sidebar --}}
        <div class="sidebar">
            <div class="sidebar-header">
                <h3><i class="fas fa-book-open"></i> Buku Tamu</h3>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="close-btn" title="Logout"><i class="fas fa-sign-out-alt"></i></button>
                </form>
            </div>
            <div class="sidebar-menu">
                <p class="menu-title">Menu Utama</p>
                <a href="{{ route('dashboard') }}" class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <p class="menu-title">Tamu</p>
                <a href="{{ route('guests.index') }}" class="menu-item {{ request()->is('guests*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Tamu
                </a>
                <a href="{{ route('invitations.index') }}" class="menu-item {{ request()->is('invitations*') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i> Undangan
                </a>
                <a href="{{ route('events.index') }}" class="menu-item {{ request()->is('events*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i> Acara
                </a>
                <a href="{{ route('users.index') }}" class="menu-item {{ request()->is('users*') ? 'active' : '' }}">
                    <i class="fas fa-user-cog"></i> User
                </a>
                <a href="{{ route('attendance.index') }}" class="menu-item {{ request()->is('attendance') ? 'active' : '' }}">
                    <i class="fas fa-clipboard-list"></i> Log Kedatangan
                </a>
                <p class="menu-title">Scan</p>
                <a href="{{ route('scan') }}" class="menu-item {{ request()->is('scan') ? 'active' : '' }}">
                    <i class="fas fa-qrcode"></i> Scan
                </a>
                <a href="{{ route('scan.manual') }}" class="menu-item {{ request()->is('manual-scan') ? 'active' : '' }}">
                    <i class="fas fa-keyboard"></i> Scan Manual
                </a>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="main-content">
            {{-- Navbar --}}
            <nav class="navbar">
                <div class="menu-toggle"><i class="fas fa-bars"></i></div>
                <div class="user-menu">
                    <div class="user-info">
                        <h4>{{ Auth::user()->name }}</h4>
                        <p>Admin</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4361ee&color=fff" alt="User">
                </div>
            </nav>

            {{-- Konten halaman --}}
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
