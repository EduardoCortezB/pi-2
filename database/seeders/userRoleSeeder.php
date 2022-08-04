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

        DB::table('table_levels')->insert([
            'name_level'=>'A1',
            'isActive'=>true
        ]);

        DB::table('table_class_times')->insert([
            'start_time'=>'15:00',
            'end_time'=>'18:00',
            'daysPerWeek'=>'Lunes, Miércoles, Jueves',
            'isActive'=>true
        ]);
        DB::table('table_careers')->insert([
            'career_name'=>'Tecnologias de la información - Desarrollo de software multiplataforma',
            'isActive'=>true
        ]);
        DB::table('languages')->insert([
            'language'=>'Inglés',
            'isActive'=>true
        ]);
        DB::table('period')->insert([
            'groupName'=>'Grupo A1 Septiembre-Diciembre 2022',
            'isActive'=>true,
            'start-date'=>'5-Septiembre',
            'end-date'=>'5-Diciembre',
            'year'=>'2022',
            'id_level'=>1,
            'id_class_time'=>1,
            'language_id'=>1,
        ]);
    }
}
