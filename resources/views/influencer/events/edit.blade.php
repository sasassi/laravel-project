@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Event</h1>
<form action="{{ route('influencer.events.update', $event->_id) }}" method="post" class="grid md:grid-cols-2 gap-6">
    @csrf @method('PUT')
    <div>
        <label class="block text-sm">Title</label>
        <input name="title" value="{{ $event->title }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required />
    </div>
    <div>
        <label class="block text-sm">Date</label>
        <input type="date" name="date" value="{{ optional($event->date)->format('Y-m-d') }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required />
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm">Description</label>
        <textarea name="description" rows="4" class="mt-1 w-full rounded border border-slate-300 px-3 py-2">{{ $event->description }}</textarea>
    </div>
    <div>
        <label class="block text-sm">Location name</label>
        <input name="location_name" value="{{ $event->location_name }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" />
    </div>
    <div>
        <label class="block text-sm">Latitude</label>
        <input name="lat" type="number" step="any" value="{{ $event->lat }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" />
    </div>
    <div>
        <label class="block text-sm">Longitude</label>
        <input name="lng" type="number" step="any" value="{{ $event->lng }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" />
    </div>
    <div>
        <label class="block text-sm">Influencer name</label>
        <input name="influencer_name" value="{{ $event->influencer_name }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required />
    </div>
    <div>
        <label class="block text-sm">Contact email</label>
        <input name="contact_email" type="email" value="{{ $event->contact_email }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" />
    </div>
    <div>
        <label class="block text-sm">Contact phone</label>
        <input name="contact_phone" value="{{ $event->contact_phone }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" />
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm">Reservation URL</label>
        <input name="reservation_url" type="url" value="{{ $event->reservation_url }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" />
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm">Tags (comma separated)</label>
        <input name="tags" value="{{ implode(',', (array)($event->tags ?? [])) }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" />
    </div>
    <div class="md:col-span-2">
        <button class="rounded-lg bg-[color:var(--brand)] px-4 py-2 text-white">Save changes</button>
        <a href="{{ route('influencer.events.index') }}" class="ml-2 text-slate-700">Cancel</a>
    </div>
</form>
@endsection