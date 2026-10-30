<?php

namespace App\Http\Controllers;
use app\Models\Vaccination;

abstract class Controller
{
    public function index()
    {
        $title = 'Bakuna Tracker – Purok Lastname';
        $schedules = Vaccination::orderBy('scheduled_at')->get();
        $stats = [
            ['label' => 'Total', 'value' => $schedules->count()],
            ['label' => 'Done', 'value' => $schedules->where('status', 'Done')->count()],
            ['label' => 'Overdue', 'value' => $schedules->where('status', 'Overdue')->count()]
        ];
        $alerts = $schedules->where('status', 'Overdue');
        return view('dashboard.index', compact('title', 'stats', 'schedules', 'alerts'));
    }

}
