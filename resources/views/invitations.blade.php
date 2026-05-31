@extends('layouts.app')

@section('title', 'Daftar Undangan')
@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
</script>


@section('content')
<div class="page-header">
    <div class="page-title">
        <h2>Daftar Undangan</h2>
    </div>
    <button class="btn btn-primary" onclick="openInvitationModal()">
        <i class="fas fa-paper-plane"></i> Kirim Undangan
    </button>
</div>

{{-- Tabel Undangan --}}
<div class="card">
    <div class="card-body table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Tamu</th>
                    <th>Acara</th>
                    <th>Waktu Kirim</th>
                    <th>Status</th>
                    <th>Kode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invitations as $invitation)
                <tr>
                    <td>{{ $invitation->guest->name }}</td>
                    <td>{{ $invitation->event->name }}</td>
                    <td>{{ $invitation->sent_at }}</td>
                    <td><span class="badge badge-primary">{{ $invitation->status }}</span></td>
                    <td>{{ $invitation->code }}</td>
                    <td>
                        <form action="{{ route('invitations.destroy', $invitation->id) }}" method="POST" onsubmit="return confirm('Hapus undangan ini?')">
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

{{-- Modal Kirim Undangan --}}
<div class="modal" id="invitationModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Kirim Undangan</h3>
            <button class="modal-close" onclick="closeInvitationModal()">&times;</button>
        </div>
        <form action="{{ route('invitations.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Pilih Tamu</label>
                    <select name="guest_id" id="guest_id" class="form-control" required>
                        @foreach($guests as $guest)
                            <option value="{{ $guest->id }}">{{ $guest->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Pilih Acara</label>
                    <select name="event_id" id="event_id" class="form-control" required>
                        @foreach($events as $event)
                            <option value="{{ $event->id }}">{{ $event->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" onclick="closeInvitationModal()">Batal</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </div>
</div>
@endsection
