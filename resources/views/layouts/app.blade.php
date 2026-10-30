<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Bakuna Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-stone-50 text-slate-800 antialiased">
    <header class="border-b border-stone-200 bg-white">
        <nav class="mx-auto flex min-h-16 max-w-6xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8" aria-label="Main navigation">
            <a href="{{ url('/') }}" class="shrink-0 text-lg font-semibold tracking-tight text-slate-900">
                Bakuna Tracker
            </a>

            <div class="flex items-center gap-3 text-sm sm:gap-6">
                @auth
                    <a href="{{ route('dashboard') }}" @class([
                        'font-medium transition hover:text-emerald-800',
                        'text-emerald-800' => request()->routeIs('dashboard'),
                        'text-slate-600' => ! request()->routeIs('dashboard'),
                    ])>Dashboard</a>
                    <a href="{{ route('schedule') }}" @class([
                        'font-medium transition hover:text-emerald-800',
                        'text-emerald-800' => request()->routeIs('schedule'),
                        'text-slate-600' => ! request()->routeIs('schedule'),
                    ])>Schedule</a>
                    <span class="hidden border-l border-stone-200 pl-5 text-slate-500 sm:inline">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-medium text-slate-500 transition hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-700 focus:ring-offset-2">
                            Log out
                        </button>
                    </form>
                @endauth
                @guest
                    @unless (request()->routeIs('login'))
                        <a href="{{ route('login') }}" class="font-medium text-emerald-800 hover:underline">Sign in</a>
                    @endunless
                @endguest
            </div>
        </nav>
    </header>

    <main @class([
        'min-h-[calc(100vh-4rem)] px-4 sm:px-6 lg:px-8',
        'flex items-center justify-center py-12' => request()->routeIs('login'),
        'py-8 sm:py-10' => ! request()->routeIs('login'),
    ])>
        <div @class([
            'mx-auto w-full',
            'max-w-md' => request()->routeIs('login'),
            'max-w-6xl' => ! request()->routeIs('login'),
        ])>
            @yield('content')
        </div>
    </main>
</body>
</html>
