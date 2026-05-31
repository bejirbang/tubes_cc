<div class="navbar">
    <div class="menu-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </div>
    <div class="user-menu">
        <div class="user-info">
            <h4>{{ Auth::user()->name ?? 'Admin' }}</h4>
            <p>{{ Auth::user()->email ?? '' }}</p>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn" title="Logout">
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </form>
    </div>
</div>
