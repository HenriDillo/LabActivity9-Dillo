@extends('layouts.app')
@section('title', 'Sign in')
@section('content')
<section class="rounded-lg border border-stone-200 bg-white p-6 shadow-sm sm:p-8">
    <div class="mb-7">
        <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Sign in</h1>
        <p class="mt-2 text-sm leading-6 text-slate-600">Use your account to continue to the vaccination records.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="mb-1.5 block text-sm font-medium text-slate-700">Email address</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="name@example.com"
                autocomplete="email"
                required
                aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                class="w-full rounded-md border bg-white px-3 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 @error('email') border-rose-400 focus:border-rose-600 focus:ring-rose-100 @else border-stone-300 focus:border-emerald-700 focus:ring-emerald-100 @enderror"
            >
            @error('email')
                <p role="alert" class="mt-2 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="mb-1.5 block text-sm font-medium text-slate-700">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                placeholder="Password"
                autocomplete="current-password"
                required
                aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}"
                class="w-full rounded-md border bg-white px-3 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 @error('password') border-rose-400 focus:border-rose-600 focus:ring-rose-100 @else border-stone-300 focus:border-emerald-700 focus:ring-emerald-100 @enderror"
            >
            @error('password')
                <p role="alert" class="mt-2 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="mt-2 w-full rounded-md bg-emerald-800 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-emerald-700 focus:ring-offset-2">
            Sign in
        </button>
    </form>
</section>
@endsection
