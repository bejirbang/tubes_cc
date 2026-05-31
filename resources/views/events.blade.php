@extends('layouts.app')

@section('title', 'Data Acara')
@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
</script>
@section('content')
<div class="page-header">
    <div class="page-title">
        <h2>Daftar Acara</h2>
    </div>
    <button class="btn btn-primary" onclick="openEventModal()">
        <i class="fas fa-calendar-plus"></i> Tambah Acara
    </button>
</div>

{{-- Tabel Acara --}}
<div class="card">
    <div class="card-body table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Acara</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->start_time }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Hapus acara ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Tambah Acara --}}
<div class="modal" id="eventModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Tambah Acara</h3>
            <button class="modal-close" onclick="closeEventModal()">&times;</button>
        </div>
        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Acara</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="start_time" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Waktu Selesai</label>
                    <input type="date" name="end_time" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="location" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" onclick="closeEventModal()">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
