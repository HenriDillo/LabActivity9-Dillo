@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="space-y-7">
    <section class="flex flex-col justify-between gap-4 border-b border-stone-200 pb-6 sm:flex-row sm:items-end">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Vaccination records</h1>
            <p class="mt-1.5 text-sm text-slate-600">A summary of patient vaccination activity.</p>
        </div>
        <a href="{{ route('schedule') }}" class="inline-flex items-center justify-center self-start rounded-md border border-stone-300 bg-white px-3.5 py-2 text-sm font-medium text-slate-700 transition hover:bg-stone-100 focus:outline-none focus:ring-2 focus:ring-emerald-700 focus:ring-offset-2 sm:self-auto">
            View full schedule
        </a>
    </section>

    <section class="grid grid-cols-2 border-y border-stone-200 bg-white sm:grid-cols-4" aria-label="Vaccination statistics">
        <div class="border-b border-r border-stone-200 px-4 py-4 sm:border-b-0 sm:px-5">
            <p class="text-sm text-slate-500">Total records</p>
            <p class="mt-1 text-2xl font-semibold text-slate-900">{{ $stats['total'] }}</p>
        </div>
        <div class="border-b border-stone-200 px-4 py-4 sm:border-b-0 sm:border-r sm:px-5">
            <p class="text-sm text-slate-500">Scheduled</p>
            <p class="mt-1 text-2xl font-semibold text-slate-900">{{ $stats['scheduled'] }}</p>
        </div>
        <div class="border-r border-stone-200 px-4 py-4 sm:px-5">
            <p class="text-sm text-slate-500">Completed</p>
            <p class="mt-1 text-2xl font-semibold text-slate-900">{{ $stats['completed'] }}</p>
        </div>
        <div class="px-4 py-4 sm:px-5">
            <p class="text-sm text-slate-500">Overdue</p>
            <p class="mt-1 text-2xl font-semibold text-slate-900">{{ $stats['overdue'] }}</p>
        </div>
    </section>

    <section class="overflow-hidden border border-stone-200 bg-white">
        <div class="flex items-center justify-between border-b border-stone-200 px-4 py-4 sm:px-5">
            <div>
                <h2 class="font-semibold text-slate-900">Upcoming vaccinations</h2>
            </div>
            <a href="{{ route('schedule') }}" class="text-sm font-medium text-emerald-800 hover:underline">See all</a>
        </div>

        @if ($vaccinations->isEmpty())
            <p class="px-4 py-8 text-sm text-slate-500 sm:px-5">No vaccination records yet.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full min-w-[640px] text-left text-sm">
                    <thead class="bg-stone-50 text-xs font-medium text-slate-500">
                        <tr>
                            <th scope="col" class="px-4 py-3 font-medium sm:px-5">Patient</th>
                            <th scope="col" class="px-4 py-3 font-medium">Vaccine</th>
                            <th scope="col" class="px-4 py-3 font-medium">Date</th>
                            <th scope="col" class="px-4 py-3 font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @foreach ($vaccinations as $vaccination)
                            <tr>
                                <td class="px-4 py-3.5 font-medium text-slate-900 sm:px-5">{{ $vaccination->patient_name }}</td>
                                <td class="px-4 py-3.5 text-slate-600">{{ $vaccination->vaccine }}</td>
                                <td class="px-4 py-3.5 text-slate-600">{{ $vaccination->scheduled_at->format('M j, Y') }}</td>
                                <td class="px-4 py-3.5">
                                    <span @class([
                                        'font-medium',
                                        'text-amber-800' => $vaccination->status === 'Scheduled',
                                        'text-emerald-800' => $vaccination->status === 'Completed',
                                        'text-rose-700' => $vaccination->status === 'Overdue',
                                    ])>{{ $vaccination->status }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</div>
@endsection
