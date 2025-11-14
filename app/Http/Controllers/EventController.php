<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        if ($search = $request->query('q')) {
            $query->where('title', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%")
                  ->orWhere('tags', 'all', [Str::lower($search)]);
        }

        $events = $query->orderBy('date', 'asc')->limit(50)->get();

        return view('events.index', compact('events', 'search'));
    }

    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }
}