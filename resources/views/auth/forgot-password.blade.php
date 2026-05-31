@extends('layouts.auth')

@section('content')
    <div id="forgot-password-page" class="auth-container">
        <div class="auth-card fade-in">
            <div class="auth-header">
                <h2><i class="fas fa-key"></i> Lupa Password</h2>
                <p>Masukkan email untuk reset password</p>
            </div>
            <div class="auth-body">
                <form id="forgot-password-form">
                    <div class="form-group">
                        <label for="reset-email">Email</label>
                        <input type="email" name="email" id="reset-email" class="form-control" placeholder="Masukkan email Anda" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-paper-plane"></i> Kirim Link Reset
                        </button>
                    </div>
                </form>
            </div>
            <div class="auth-footer">
                Ingat password? <a href="{{ route('login') }}" id="back-to-login-link">Kembali ke login</a>
            </div>
        </div>
    </div>

@endsection
