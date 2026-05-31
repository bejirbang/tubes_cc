@extends('layouts.app')

@section('title', 'Scan QR Code')

@section('content')
<div class="page-header">
    <div class="page-title">
        <h2>Scan QR Undangan</h2>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('scan.qr') }}">
            @csrf
            <div class="form-group">
                <label for="code">Masukkan Kode Undangan (Simulasi Scan QR)</label>
                <input type="text" name="code" id="code" class="form-control" required>
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-qrcode"></i> Scan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
