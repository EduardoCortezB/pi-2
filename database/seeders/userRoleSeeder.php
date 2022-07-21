<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_rols')->insert([
            'name_role'=>'Administrador'
        ]);
        DB::table('table_rols')->insert([
            'name_role'=>'Alumno'
        ]);
        DB::table('users')->insert([
            'name'  => 'Eduardo',
            'lastName'  => 'Cortez',
            'phoneNumber'  => '8991544118',
            'email'  => 'jesus.banda@uttn.mx',
            'password'  => Hash::make('12345'),
            'id_rol'  => '1'
        ]);

    }
}
