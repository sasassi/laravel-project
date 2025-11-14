<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CatchyApp</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        :root{--brand:#60a5fa;--accent:#fb7185;--accent2:#34d399;--ink:#0f172a}
        .gradient{background:linear-gradient(135deg,#e0f2fe 0%,#f8fafc 100%)}
    </style>
</head>
<body class="min-h-dvh bg-white text-slate-800">
<header class="sticky top-0 z-40 bg-white/80 backdrop-blur border-b border-slate-200">
    <div class="mx-auto max-w-7xl px-4 py-3 flex items-center justify-between">
        <a href="{{ url('/') }}" class="font-semibold text-xl text-slate-900">Catchy<span class="text-[color:var(--brand)]">App</span></a>
        <nav class="flex items-center gap-4">
            <a href="{{ route('events.index') }}" class="text-slate-700 hover:text-[color:var(--brand)]">Explore Events</a>
            <a href="{{ route('influencer.events.index') }}" class="inline-flex items-center rounded-lg bg-[color:var(--brand)] px-3 py-2 text-white hover:opacity-90">Influencer Dashboard</a>
        </nav>
    </div>
</header>

<main class="mx-auto max-w-7xl px-4 py-8">
    @yield('content')
</main>

<footer class="mt-16 border-t border-slate-200">
    <div class="mx-auto max-w-7xl px-4 py-6 text-sm text-slate-600">© {{ date('Y') }} CatchyApp</div>
    </footer>
</body>
</html>