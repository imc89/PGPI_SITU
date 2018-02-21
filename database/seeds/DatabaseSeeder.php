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
        'tiempolog' => '0001-01-01 00:00:00',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123'),
    ]);

     DB::table('users')->insert([
        'name' => 'IÑIGO',
        'rol' => '1',
        'tiempolog' => '0001-01-01 00:00:00',
        'email' => 'u1@gmail.com',
        'password' => bcrypt('123'),
    ]);

     DB::table('users')->insert([
        'name' => 'ABEL',
        'rol' => '1',
        'tiempolog' => '0001-01-01 00:00:00',
        'email' => 'u2@gmail.com',
        'password' => bcrypt('123'),
    ]);

     DB::table('users')->insert([
        'name' => 'ALEX',
        'rol' => '1',
        'tiempolog' => '0001-01-01 00:00:00',
        'email' => 'u3@gmail.com',
        'password' => bcrypt('123'),
    ]);

     DB::table('users')->insert([
        'name' => 'CARLOS',
        'rol' => '1',
        'tiempolog' => '0001-01-01 00:00:00',
        'email' => 'u4@gmail.com',
        'password' => bcrypt('123'),
    ]);
 }
}
