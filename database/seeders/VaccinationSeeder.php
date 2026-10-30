<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vaccination;

class VaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            ['patient_name' => 'Maria Clara Santos', 'purok' => 'Purok 2', 'vaccine' => 'Pentavalent', 'dose' => '2nd dose', 'scheduled_at' => '2026-11-10', 'status' => 'Scheduled'],
            ['patient_name' => 'Lito Lapid Jr.', 'purok' => 'Purok 4', 'vaccine' => 'OPV', 'dose' => '1st dose', 'scheduled_at' => '2026-10-15', 'status' => 'Overdue'],
            ['patient_name' => 'Nanay Rosa Dizon', 'purok' => 'Purok 5', 'vaccine' => 'Pneumococcal', 'dose' => '1st dose', 'scheduled_at' => '2026-10-28', 'status' => 'Completed'],
            ['patient_name' => 'Baby Sofia Gonzales', 'purok' => 'Purok 1', 'vaccine' => 'MMR', 'dose' => '1st dose', 'scheduled_at' => '2026-11-05', 'status' => 'Scheduled'],
            ['patient_name' => 'Tatay Cardo Dalisay', 'purok' => 'Purok 3', 'vaccine' => 'Anti-Flu', 'dose' => 'Annual', 'scheduled_at' => '2026-10-01', 'status' => 'Completed'],
            ['patient_name' => 'Baby Ethan Mercado', 'purok' => 'Purok 6', 'vaccine' => 'Hepatitis B', 'dose' => 'Birth dose', 'scheduled_at' => '2026-10-22', 'status' => 'Overdue'],
            ['patient_name' => 'Baby Angelo Ramos', 'purok' => 'Purok 2', 'vaccine' => 'IPV', 'dose' => '1st dose', 'scheduled_at' => '2026-11-12', 'status' => 'Scheduled'],
            ];
            
        foreach ($rows as $row) {
            Vaccination::create($row);
        }

    }
}
