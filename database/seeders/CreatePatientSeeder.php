<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;

class CreatePatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Patient::create([
            'name' => 'Jorge', 
            'lastname' => 'Alvarado', 
            'address' => 'VILLAS DEL REY', 
            'bloodtype' => 'O+', 
            'cellphone' => '0987418665', 
            'email' => 'marioaguilar1990@gmail.com', 
            'inmunizations' => 1, 
            'allergy' => 0, 
            'allergies' => 'Nothing', 
            'country' => 63, 
            'state' => 1031, 
            'city' => 15342, 
            'user_cre' => 1,
            'status' => 1
        ]);

    }
}
