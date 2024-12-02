<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class aerolineasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aerolineas')->insert([
            [
                'aerolinea' => 'Aeromexico'
            ],
            [
                'aerolinea' => 'Volaris'
            ],
            [
                'aerolinea' => 'Interjet'
            ],
            [
                'aerolinea' => 'Viva Aerobus'
            ]]
        );
    }
}
