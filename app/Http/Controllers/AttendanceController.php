<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Guest;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = \App\Models\Attendance::with('guest', 'event')->latest()->get();
        return view('attendance', compact('attendances'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'event_id' => 'required|exists:events,id',
            'status'   => 'required|in:Check In,Check Out',
            'method'   => 'required|in:QR,Manual'
        ]);

        Attendance::create([
            'guest_id' => $request->guest_id,
            'event_id' => $request->event_id,
            'method'   => $request->method,
            'status'   => $request->status,
            'time'     => now(),
        ]);

        return back()->with('success', 'Kehadiran dicatat.');
    }
}
