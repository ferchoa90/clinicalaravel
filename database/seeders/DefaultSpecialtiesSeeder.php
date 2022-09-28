<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;

class DefaultSpecialtiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = file_get_contents(storage_path('specialties/specialties.json'));
        $specialties = json_decode($specialties, true)['specialties'];
        Specialty::insert($specialties);

    }
}