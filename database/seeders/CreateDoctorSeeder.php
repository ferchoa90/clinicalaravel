<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;

class CreateDoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Doctor::create([
            'name' => 'Andrés', 
            'lastname' => 'Zúñiga', 
            'address' => 'URBANOR', 
            'bloodtype' => 'O+', 
            'specialty' => 5, 
            'cellphone' => '0987418665', 
            'country' => 63, 
            'state' => 1031, 
            'city' => 15342, 
            'user_cre' => 1,
            'status' => 1
        ]);

    }
}
