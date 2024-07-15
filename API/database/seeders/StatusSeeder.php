<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Statuses;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Status = [
            'Disponible',
            'Ocupado',
            'Reservado',
            'Mantenimiento',
        ];

        foreach ($Status as $status) {
            Statuses::create([
                'name' => $status,
            ]);
        }
    }
}
