@extends('layouts.app')

@section('title', 'Scan Manual')

@section('content')
<div class="page-header">
    <div class="page-title">
        <h2>Scan Manual Kehadiran</h2>
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

        <form method="POST" action="{{ route('scan.manual.submit') }}">
            @csrf
            <div class="form-group">
                <label for="guest_id">Pilih Tamu</label>
                <select name="guest_id" id="guest_id" class="form-control" required>
                    <option value="" disabled selected>-- Pilih tamu --</option>
                    @foreach($guests as $guest)
                        <option value="{{ $guest->id }}">{{ $guest->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="event_id">Pilih Acara</label>
                <select name="event_id" id="event_id" class="form-control" required>
                    <option value="" disabled selected>-- Pilih acara --</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-keyboard"></i> Catat Kehadiran
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
