@extends('layouts.auth')

@section('content')
     <div id="login-page" class="auth-container">
        <div class="auth-card fade-in">
            <div class="auth-header">
                <h2><i class="fas fa-book-open"></i> Buku Tamu Digital</h2>
                <p>Silakan masuk ke akun Anda</p>
            </div>
            <div class="auth-body">
                <form id="login-form" action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password Anda" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-sign-in-alt"></i> Masuk
                        </button>
                    </div>
                </form>
            </div>
            <div class="auth-footer">
                Belum punya akun? <a href="{{ route('register') }}" id="register-link">Daftar disini</a> | 
                <a href="{{ route('password.request') }}" id="forgot-password-link">Lupa password?</a>
            </div>
        </div>
    </div>

@endsection
