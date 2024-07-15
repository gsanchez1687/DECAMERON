<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeRooms;

class TypeRoom extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $TypeRoom = [
            'Estandar',
            'Junior',
            'Suite',
        ];

        foreach ($TypeRoom as $type) {
            TypeRooms::create([
                'name' => $type,
            ]);
        }
    }
}
