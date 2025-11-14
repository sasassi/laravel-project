@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Your Events</h1>
    <a href="{{ route('influencer.events.create') }}" class="inline-flex rounded-lg bg-[color:var(--brand)] px-3 py-2 text-white">Create Event</a>
</div>

@if(session('status'))
    <div class="mb-4 rounded-lg bg-green-50 text-green-700 px-3 py-2">{{ session('status') }}</div>
@endif

@if($events->isEmpty())
    <div class="text-slate-600">No events yet.</div>
@else
<div class="rounded-xl overflow-hidden border border-slate-200">
    <table class="min-w-full divide-y divide-slate-200">
        <thead class="bg-slate-50">
            <tr>
                <th class="px-4 py-2 text-left">Title</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Location</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
        @foreach($events as $event)
            <tr>
                <td class="px-4 py-2">{{ $event->title }}</td>
                <td class="px-4 py-2 text-center">{{ optional($event->date)->format('Y-m-d') }}</td>
                <td class="px-4 py-2 text-center">{{ $event->location_name }}</td>
                <td class="px-4 py-2 text-center flex justify-center gap-2">
                    <a href="{{ route('events.show', $event->_id) }}" class="rounded bg-slate-100 px-2 py-1">View</a>
                    <a href="{{ route('influencer.events.edit', $event->_id) }}" class="rounded bg-blue-100 px-2 py-1">Edit</a>
                    <form action="{{ route('influencer.events.destroy', $event->_id) }}" method="post" onsubmit="return confirm('Delete this event?')">
                        @csrf @method('DELETE')
                        <button class="rounded bg-rose-100 px-2 py-1">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection