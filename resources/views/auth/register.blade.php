@extends('layouts.auth')

@section('content')
  <div id="register-page" class="auth-container">
        <div class="auth-card fade-in">
            <div class="auth-header">
                <h2><i class="fas fa-user-plus"></i> Buat Akun Baru</h2>
                <p>Isi formulir berikut untuk mendaftar</p>
            </div>
            <div class="auth-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="register-form" method="POST" action="{{ route('register.store') }}">
                    @csrf   
                    <div class="form-group">
                        <label for="reg-name">Nama Lengkap</label>
                        <input type="text" name="name" id="reg-name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="reg-email">Email</label>
                        <input type="email" name="email" id="reg-email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="reg-password">Password</label>
                        <input type="password" name="password" id="reg-password" class="form-control @error('password') is-invalid @enderror" placeholder="Buat password" required>
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="reg-confirm-password">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="reg-confirm-password" class="form-control" placeholder="Ulangi password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-user-plus"></i> Daftar
                        </button>
                    </div>
                </form>
            </div>
            <div class="auth-footer">
                Sudah punya akun? <a href="{{ route('login') }}" id="login-link">Masuk disini</a>
            </div>
        </div>
    </div>

@endsection
