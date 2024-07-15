<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accommodations;

class AccomodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Accomodation = [
            'Sencilla',
            'Doble',
            'Triple',
            'Cuaduple',
        ];

        foreach ($Accomodation as $accomodation) {
            Accommodations::create([
                'name' => $accomodation,
            ]);
        }
    }
}
