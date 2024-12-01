<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class lugarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lugares = [
            [
                'lugar' => 'CDMX'
            ],
            [
                'lugar' => 'Guadalajara'
            ],
            [
                'lugar' => 'Monterrey'
            ],
            [
                'lugar' => 'Cancún'
            ]
        ];

        foreach ($lugares as $lugar) {
            \App\Models\Lugar::create($lugar);
        }
    }
}
