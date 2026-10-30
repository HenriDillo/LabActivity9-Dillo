<?php

namespace App\Http\Controllers;

use App\Models\Vaccination;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $vaccinations = Vaccination::query()
            ->orderBy('scheduled_at')
            ->limit(5)
            ->get();

        $stats = [
            'total' => Vaccination::count(),
            'scheduled' => Vaccination::where('status', 'Scheduled')->count(),
            'completed' => Vaccination::where('status', 'Completed')->count(),
            'overdue' => Vaccination::where('status', 'Overdue')->count(),
        ];

        return view('dashboard', compact('vaccinations', 'stats'));
    }

    public function schedule(): View
    {
        $vaccinations = Vaccination::query()
            ->orderBy('scheduled_at')
            ->get();

        return view('schedule', compact('vaccinations'));
    }
}
