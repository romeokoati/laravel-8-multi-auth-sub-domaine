<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

       DB::table("admins")->insert([
            'email' => 'admin@gmail.com',
            'nom' => 'Admin',
            'prenom' => 'Joe',
            'password'=>Hash::make("123456"),
        ]);


        DB::table("editors")->insert([
            'email' => 'editor@gmail.com',
            'nom' => 'Editor',
            'prenom' => 'Jean',
            'telephone' => '656304739',
            'password'=>Hash::make("123456"),
        ]);




    }
}
