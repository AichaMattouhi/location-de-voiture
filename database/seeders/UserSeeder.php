<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nom' => 'aicha',
                'prenom' => 'aicha',
                'adress' => '123 Main Street',
                'zipcode' => '12345',
                'vile' => 'Cityville',
                'pays' => 'Country',
                'telephone' => '123456789',
                'permis' => 'ABC123',
                'role_id' => 1,
                'email' => 'aicha@um6p.ma',
                'email_verified_at' => now(),
                'password' => bcrypt('123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'salma',
                'prenom' => 'salma',
                'adress' => '123 Main Street',
                'zipcode' => '12345',
                'vile' => 'Cityville',
                'pays' => 'Country',
                'telephone' => '123456789',
                'permis' => 'ABC123',
                'role_id' => 2,
                'email' => 'salma@um6p.ma',
                'email_verified_at' => now(),
                'password' => bcrypt('123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
    
}
