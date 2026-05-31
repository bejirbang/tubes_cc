<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
    return view('events', ['events' => Event::all()]);
    }   

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'start_time' => 'required|date',
            'end_time'   => 'required|date|after:start_time',
            'location'   => 'required',
        ]);

        $event = new Event();
        $event->name = $request->name;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->location = $request->location;
        $event->save();

        return back()->with('success', 'Acara berhasil dibuat');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return back()->with('success', 'Acara dihapus');
    }
}
