<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([
            'name' => 'admim',
            'lastname'=> 'admin',
            'email' => 'gsanchez1687@gmail.com',
            'phone' => '3166427903',
            'address' => 'Calle 1 # 2-3',
            'password' => bcrypt('12345678'),
        ]);
    }
}
