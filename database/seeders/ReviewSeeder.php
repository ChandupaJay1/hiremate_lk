<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Review::create([
            'name' => 'Priyantha Fernando',
            'email' => 'priyantha@example.com',
            'rating' => 5,
            'comment' => 'Excellent service! Found a reliable mason within hours. The verification process gives me peace of mind.',
            'service_type' => 'Masons',
            'approved' => true,
        ]);

        \App\Models\Review::create([
            'name' => 'Sarath Kumara',
            'email' => 'sarath@example.com',
            'rating' => 5,
            'comment' => 'As a business owner, I needed reliable electricians urgently. HireMate LK delivered exactly what I needed.',
            'service_type' => 'Electricians',
            'approved' => true,
        ]);

        \App\Models\Review::create([
            'name' => 'Amali Perera',
            'email' => 'amali@example.com',
            'rating' => 5,
            'comment' => 'The platform is user-friendly and the booking process was seamless. Highly recommend for home services!',
            'service_type' => 'Painters',
            'approved' => true,
        ]);

        \App\Models\Review::create([
            'name' => 'Nimal Jayasinghe',
            'email' => 'nimal@example.com',
            'rating' => 4,
            'comment' => 'Great experience with the plumber service. Quick response and professional work.',
            'service_type' => 'Plumbers',
            'approved' => true,
        ]);

        \App\Models\Review::create([
            'name' => 'Kumari Silva',
            'email' => 'kumari@example.com',
            'rating' => 5,
            'comment' => 'Found an amazing carpenter who completed my renovation perfectly. Will use again!',
            'service_type' => 'Carpenters',
            'approved' => true,
        ]);
    }
}
