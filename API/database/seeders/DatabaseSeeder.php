<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Mockery\Matcher\Type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
            TypeRoom::class,
            StatusSeeder::class,
            AccomodationSeeder::class,
            UserSeeder::class,
         ]);
    }
}
