<?php

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
        // $this->call(UsersTableSeeder::class);
        // Creando Usuario Por Defecto
    	$this->createUsers();
    }

    public function createUsers()
    {
        DB::table('users')->insert([
            'name' =>  'Administrador',
            'email' => 'julio899@gmail.com',
            'password' => bcrypt('vinachi89'),
            'remember_token' => Str::random(100),
            'created_at' => now(),
            'email_verified_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
