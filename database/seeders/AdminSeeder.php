<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin::updateOrCreate(
            ['email' => 'chandupajayalath20@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
            ]
        );
    }
}
