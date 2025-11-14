@extends('layouts.app')

@section('content')
<article class="grid md:grid-cols-3 gap-8">
    <div class="md:col-span-2">
        <h1 class="text-3xl font-bold text-slate-900">{{ $event->title }}</h1>
        <p class="mt-2 text-slate-700">{{ $event->description }}</p>

        <div class="mt-6 grid sm:grid-cols-2 gap-4">
            <div class="rounded-xl border border-slate-200 p-4">
                <div class="text-sm text-slate-500">Date</div>
                <div class="text-lg">{{ optional($event->date)->format('l, F j, Y') }}</div>
            </div>
            <div class="rounded-xl border border-slate-200 p-4">
                <div class="text-sm text-slate-500">Location</div>
                <div class="text-lg">{{ $event->location_name ?? '—' }}</div>
            </div>
            <div class="rounded-xl border border-slate-200 p-4">
                <div class="text-sm text-slate-500">Influencer</div>
                <div class="text-lg">{{ $event->influencer_name }}</div>
            </div>
            <div class="rounded-xl border border-slate-200 p-4">
                <div class="text-sm text-slate-500">Contact</div>
                <div class="text-lg space-x-3">
                    @if($event->contact_email)
                        <a href="mailto:{{ $event->contact_email }}" class="text-[color:var(--brand)]">Email</a>
                    @endif
                    @if($event->contact_phone)
                        <span>{{ $event->contact_phone }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center gap-3">
            @if($event->reservation_url)
                <a href="{{ $event->reservation_url }}" target="_blank" class="inline-flex rounded-lg bg-[color:var(--accent)] px-4 py-2 text-white">Reserve</a>
            @endif
            @if($event->lat && $event->lng)
                <a href="https://maps.google.com/?q={{ $event->lat }},{{ $event->lng }}" target="_blank" class="inline-flex rounded-lg bg-[color:var(--accent2)] px-4 py-2 text-white">Open Map</a>
            @endif
        </div>
    </div>

    <aside class="space-y-4">
        <div class="rounded-xl border border-slate-200 p-4">
            <div class="text-sm text-slate-500">Tags</div>
            <div class="mt-2 flex flex-wrap gap-2">
                @forelse(($event->tags ?? []) as $t)
                    <span class="rounded-full bg-blue-50 text-blue-700 px-2 py-1 text-sm">#{{ $t }}</span>
                @empty
                    <span class="text-slate-500">No tags</span>
                @endforelse
            </div>
        </div>
        <div class="rounded-xl border border-slate-200 p-4 gradient">
            <div class="text-lg font-semibold">Connect with {{ $event->influencer_name }}</div>
            <p class="mt-1 text-slate-600">Follow and message to collaborate.</p>
            @if($event->contact_email)
                <a href="mailto:{{ $event->contact_email }}" class="mt-3 inline-flex rounded-lg bg-[color:var(--brand)] px-3 py-2 text-white">Send Email</a>
            @endif
        </div>
    </aside>
</article>
@endsection