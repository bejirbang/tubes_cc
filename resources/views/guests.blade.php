@extends('layouts.app')

@section('title', 'Data Tamu')
@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
</script>

@section('content')
<div class="page-header">
    <div class="page-title">
        <h2>Daftar Tamu</h2>
    </div>
    <button class="btn btn-primary" onclick="openGuestModal()">
        <i class="fas fa-plus"></i> Tambah Tamu
    </button>
</div>

{{-- Tabel Tamu --}}
<div class="card">
    <div class="card-body table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Instansi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guests as $guest)
                <tr>
                    <td>{{ $guest->name }}</td>
                    <td>{{ $guest->email }}</td>
                    <td>{{ $guest->phone }}</td>
                    <td>{{ $guest->institution }}</td>
                    <td>
                        <form action="{{ route('guests.destroy', $guest->id) }}" method="POST" onsubmit="return confirm('Hapus tamu ini?')">
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

{{-- Modal Tambah Tamu --}}
<div class="modal" id="guestModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Tambah Tamu</h3>
            <button class="modal-close" onclick="closeGuestModal()">&times;</button>
        </div>
        <form action="{{ route('guests.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label>Instansi</label>
                    <input type="text" name="institution" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" onclick="closeGuestModal()">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
