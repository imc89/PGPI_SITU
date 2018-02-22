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
            'nombre' => 'Trabajo Académico',
        ]);

        DB::table('tags')->insert([
            'nombre' => 'Calificaciones',
        ]);

        DB::table('tags')->insert([
            'nombre' => 'Recuerdos',
        ]);

        DB::table('tags')->insert([
            'nombre' => 'Frases Guía',
        ]);   

        DB::table('tags')->insert([
            'nombre' => 'Reflexiones',
        ]);   

        DB::table('tags')->insert([
            'nombre' => 'Portafolios Profesional',
        ]);  

        DB::table('tags')->insert([
            'nombre' => 'Proyectos de investigación',
        ]);
    }
}
