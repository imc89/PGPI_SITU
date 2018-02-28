<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan db:seed
		// o
        // php artisan migrate:refresh --seed
     DB::table('users')->insert([
        'name' => 'ADMIN',
        'rol' => '0',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123'),
    ]);

     DB::table('users')->insert([
        'name' => 'IÑIGO',
        'rol' => '1',
        'email' => 'u1@gmail.com',
        'password' => bcrypt('123'),
    ]);

     DB::table('users')->insert([
        'name' => 'ABEL',
        'rol' => '1',
        'email' => 'u2@gmail.com',
        'password' => bcrypt('123'),
    ]);

     DB::table('users')->insert([
        'name' => 'ALEX',
        'rol' => '1',
        'email' => 'u3@gmail.com',
        'password' => bcrypt('123'),
    ]);

     DB::table('users')->insert([
        'name' => 'CARLOS',
        'rol' => '1',
        'email' => 'u4@gmail.com',
        'password' => bcrypt('123'),
    ]);

      DB::table('users')->insert([
        'name' => 'ALVARO',
        'rol' => '2',
        'email' => 'prof@gmail.com',
        'password' => bcrypt('123'),
    ]);

        // php artisan db:seed
        // o
        // php artisan migrate:refresh --seed
        DB::table('tags')->insert([
            'name' => 'Trabajo Académico',
        ]);

        DB::table('tags')->insert([
            'name' => 'Calificaciones',
        ]);

        DB::table('tags')->insert([
            'name' => 'Recuerdos',
        ]);

        DB::table('tags')->insert([
            'name' => 'Frases Guía',
        ]);   

        DB::table('tags')->insert([
            'name' => 'Reflexiones',
        ]);   

        DB::table('tags')->insert([
            'name' => 'Portafolios Profesional',
        ]);  

        DB::table('tags')->insert([
            'name' => 'Proyectos de investigación',
        ]);
 }
}
