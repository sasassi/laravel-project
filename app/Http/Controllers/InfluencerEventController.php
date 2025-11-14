<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class InfluencerEventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date', 'desc')->get();
        return view('influencer.events.index', compact('events'));
    }

    public function create()
    {
        return view('influencer.events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string'],
            'date' => ['required', 'date'],
            'location_name' => ['nullable', 'string', 'max:160'],
            'lat' => ['nullable', 'numeric'],
            'lng' => ['nullable', 'numeric'],
            'influencer_name' => ['required', 'string', 'max:120'],
            'contact_email' => ['nullable', 'email'],
            'contact_phone' => ['nullable', 'string', 'max:40'],
            'reservation_url' => ['nullable', 'url'],
            'tags' => ['nullable', 'string'],
        ]);

        $data['tags'] = $this->parseTags($data['tags'] ?? '');
        Event::create($data);

        return redirect()->route('influencer.events.index')->with('status', 'Event created');
    }

    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('influencer.events.edit', compact('event'));
    }

    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string'],
            'date' => ['required', 'date'],
            'location_name' => ['nullable', 'string', 'max:160'],
            'lat' => ['nullable', 'numeric'],
            'lng' => ['nullable', 'numeric'],
            'influencer_name' => ['required', 'string', 'max:120'],
            'contact_email' => ['nullable', 'email'],
            'contact_phone' => ['nullable', 'string', 'max:40'],
            'reservation_url' => ['nullable', 'url'],
            'tags' => ['nullable', 'string'],
        ]);

        $data['tags'] = $this->parseTags($data['tags'] ?? '');
        $event->update($data);

        return redirect()->route('influencer.events.index')->with('status', 'Event updated');
    }

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('influencer.events.index')->with('status', 'Event deleted');
    }

    private function parseTags(string $tags): array
    {
        $items = array_filter(array_map('trim', explode(',', $tags)));
        return array_values(array_map('strtolower', $items));
    }
}