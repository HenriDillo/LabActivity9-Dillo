@extends('layouts.app')
@section('title', 'Vaccination schedule')
@section('content')
<section class="overflow-hidden border border-stone-200 bg-white">
    <div class="border-b border-stone-200 px-4 py-5 sm:px-5">
        <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Vaccination schedule</h1>
        <p class="mt-1.5 text-sm text-slate-600">Scheduled, completed, and overdue patient records.</p>
    </div>

    @if ($vaccinations->isEmpty())
        <p class="px-4 py-8 text-sm text-slate-500 sm:px-5">No vaccination records yet.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] text-left text-sm">
                <thead class="bg-stone-50 text-xs font-medium text-slate-500">
                    <tr>
                        <th scope="col" class="px-4 py-3 font-medium sm:px-5">Patient</th>
                        <th scope="col" class="px-4 py-3 font-medium">Area</th>
                        <th scope="col" class="px-4 py-3 font-medium">Vaccine</th>
                        <th scope="col" class="px-4 py-3 font-medium">Dose</th>
                        <th scope="col" class="px-4 py-3 font-medium">Date</th>
                        <th scope="col" class="px-4 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @foreach ($vaccinations as $vaccination)
                        <tr>
                            <td class="px-4 py-3.5 font-medium text-slate-900 sm:px-5">{{ $vaccination->patient_name }}</td>
                            <td class="px-4 py-3.5 text-slate-600">{{ $vaccination->purok }}</td>
                            <td class="px-4 py-3.5 text-slate-600">{{ $vaccination->vaccine }}</td>
                            <td class="px-4 py-3.5 text-slate-600">{{ $vaccination->dose }}</td>
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
@endsection
