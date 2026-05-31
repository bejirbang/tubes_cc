<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Event;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    public function index()
    {
        $invitations = Invitation::with('guest', 'event')->get();
        $events = Event::all();
        $guests = Guest::all();
        return view('invitations', compact('invitations', 'events', 'guests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'event_id' => 'required|exists:events,id',
        ]);

        Invitation::create([
            'guest_id' => $request->guest_id,
            'event_id' => $request->event_id,
            'sent_at' => now(),
            'status' => 'Terkirim',
            'code' => Str::uuid(), // generate kode unik untuk undangan
        ]);

        return redirect()->back()->with('success', 'Undangan berhasil dikirim.');
    }

    public function destroy(Invitation $invitation)
    {
        $invitation->delete();
        return redirect()->back()->with('success', 'Undangan dihapus.');
    }
}
