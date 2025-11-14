@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Create Event</h1>
<form action="{{ route('influencer.events.store') }}" method="post" class="grid md:grid-cols-2 gap-6">
    @csrf
    <div>
        <label class="block text-sm">Title</label>
        <input name="title" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required />
    </div>
    <div>
        <label class="block text-sm">Date</label>
        <input type="date" name="date" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required />
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm">Description</label>
        <textarea name="description" rows="4" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"></textarea>
    </div>
    <div>
        <label class="block text-sm">Location name</label>
        <input name="location_name" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" />
    </div>
    <div>
        <label class="block text-sm">Latitude</label>
        <input name="lat" type="number" step="any" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" />
    </div>
    <div>
        <label class="block text-sm">Longitude</label>
        <input name="lng" type="number" step="any" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" />
    </div>
    <div>
        <label class="block text-sm">Influencer name</label>
        <input name="influencer_name" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required />
    </div>
    <div>
        <label class="block text-sm">Contact email</label>
        <input name="contact_email" type="email" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" />
    </div>
    <div>
        <label class="block text-sm">Contact phone</label>
        <input name="contact_phone" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" />
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm">Reservation URL</label>
        <input name="reservation_url" type="url" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" />
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm">Tags (comma separated)</label>
        <input name="tags" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" placeholder="music, fashion, meetup" />
    </div>
    <div class="md:col-span-2">
        <button class="rounded-lg bg-[color:var(--brand)] px-4 py-2 text-white">Create</button>
        <a href="{{ route('influencer.events.index') }}" class="ml-2 text-slate-700">Cancel</a>
    </div>
</form>
@endsection