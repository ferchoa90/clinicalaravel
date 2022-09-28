<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class CreateMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Menu::create([
            'parent' => 0, 
            'name' => 'Dashboard', 
            'icon' => 'flaticon-025-dashboard', 
            'link' => '#', 
            'user_id' => 1, 
            'user_cre' => 1,
            'status' => 1
        ]);

        $user = Menu::create([
            'parent' => 0, 
            'name' => 'Mantenimientos', 
            'icon' => 'flaticon-043-menu', 
            'link' => '#', 
            'user_id' => 1, 
            'user_cre' => 1,
            'status' => 1
        ]);
        $user = Menu::create([
            'parent' => 0, 
            'name' => 'Agendas', 
            'icon' => 'flaticon-022-copy', 
            'link' => '#', 
            'user_id' => 1, 
            'user_cre' => 1,
            'status' => 1
        ]);

        $user = Menu::create([
            'parent' => 2, 
            'name' => 'Pacientes', 
            'icon' => 'fa fa-users', 
            'link' => '/patient', 
            'user_id' => 1, 
            'user_cre' => 1,
            'status' => 1
        ]);

        $user = Menu::create([
            'parent' => 2, 
            'name' => 'Usuarios', 
            'icon' => 'fa fa-users', 
            'link' => '/user', 
            'user_id' => 1, 
            'user_cre' => 1,
            'status' => 1
        ]);

        $user = Menu::create([
            'parent' => 2, 
            'name' => 'Doctores', 
            'icon' => 'fa fa-users', 
            'link' => '/doctor', 
            'user_id' => 1, 
            'user_cre' => 1,
            'status' => 1
        ]);

        $user = Menu::create([
            'parent' => 3, 
            'name' => 'Agendamientos', 
            'icon' => 'flaticon-043-menu', 
            'link' => '/appointment', 
            'user_id' => 1, 
            'user_cre' => 1,
            'status' => 1
        ]);

    }
}
