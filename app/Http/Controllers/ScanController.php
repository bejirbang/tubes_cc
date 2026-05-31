<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Invitation;
use App\Models\Event;
use App\Models\Guest;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function index()
    {
        return view('scan');
    }

    public function manual()
    {
        return view('manual-scan', [
            'guests' => \App\Models\Guest::all(),
            'events' => \App\Models\Event::all(),
        ]);
    }

    public function handleManual(Request $request)
    {
        \App\Models\Attendance::create([
            'guest_id' => $request->guest_id,
            'event_id' => $request->event_id,
            'method' => 'Manual',
            'status' => 'Check In',
            'time' => now(),
        ]);

        return back()->with('success', 'Kehadiran manual dicatat.');
    }


    public function handleQr(Request $request)
    {
        $invitation = Invitation::where('code', $request->code)->first();

        if (!$invitation) {
            return back()->withErrors(['code' => 'Kode QR tidak ditemukan.']);
        }

        Attendance::create([
            'guest_id' => $invitation->guest_id,
            'event_id' => $invitation->event_id,
            'method' => 'QR',
            'status' => 'Check In',
            'time' => now(),
        ]);

        return back()->with('success', 'Kehadiran melalui QR dicatat.');
    }
}
