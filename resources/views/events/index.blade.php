@extends('layouts.app')

@section('content')
<section class="gradient rounded-2xl p-6 mb-8">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Discover Influencer Events</h1>
            <p class="mt-1 text-slate-600">Light blue vibes, bright accents, and easy connections.</p>
        </div>
        <form action="{{ route('events.index') }}" method="get" class="flex gap-2">
            <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Search events, tags, creators" class="rounded-lg border border-slate-300 px-3 py-2 w-64" />
            <button class="rounded-lg bg-[color:var(--brand)] px-4 py-2 text-white">Search</button>
        </form>
    </div>
</section>

@if($events->isEmpty())
    <div class="text-slate-600">No events yet. Influencers can create one from the dashboard.</div>
@else
<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @foreach($events as $event)
        <article class="rounded-2xl border border-slate-200 overflow-hidden">
            <div class="h-2 bg-[color:var(--brand)]"></div>
            <div class="p-5">
                <h2 class="text-xl font-semibold text-slate-900">{{ $event->title }}</h2>
                <p class="mt-1 text-slate-600 line-clamp-2">{{ $event->description }}</p>
                <div class="mt-3 flex flex-wrap gap-2 text-sm">
                    <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 text-blue-700 px-2 py-1">📅 {{ optional($event->date)->format('M d, Y') }}</span>
                    @if($event->location_name)
                    <span class="inline-flex items-center gap-1 rounded-full bg-teal-50 text-teal-700 px-2 py-1">📍 {{ $event->location_name }}</span>
                    @endif
                    <span class="inline-flex items-center gap-1 rounded-full bg-rose-50 text-rose-700 px-2 py-1">👤 {{ $event->influencer_name }}</span>
                </div>
                <div class="mt-4 flex items-center gap-3">
                    <a href="{{ route('events.show', $event->_id) }}" class="inline-flex rounded-lg bg-[color:var(--brand)] px-3 py-2 text-white">View details</a>
                    @if($event->reservation_url)
                        <a href="{{ $event->reservation_url }}" target="_blank" class="inline-flex rounded-lg bg-[color:var(--accent)] px-3 py-2 text-white">Reserve</a>
                    @endif
                </div>
            </div>
        </article>
    @endforeach
</div>
@endif
@endsection