<?php

use Illuminate\Database\Seeder;

class DataTagsSeeder extends Seeder
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
