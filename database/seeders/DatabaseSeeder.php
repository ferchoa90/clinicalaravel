<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdministratorSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateUserSeeder::class);
        $this->call(DefaultCountriesSeeder::class);
        $this->call(DefaultSpecialtiesSeeder::class);
        $this->call(CreateDoctorSeeder::class);
        $this->call(CreatePatientSeeder::class);
        $this->call(CreateMenuSeeder::class);

     
    }
}
