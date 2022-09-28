<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrators')->insert([
            'name' => 'admin',
            'email' => 'admnin@admin.com',
            'password' => \Illuminate\Support\Facades\Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
