<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Admin',
        ]);
        User::create([
            'name' => 'Parent A',
            'email' => 'parenta@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Parent',
        ]);
        User::create([
            'name' => 'Parent B',
            'email' => 'Parentb@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Parent',
        ]);
        User::create([
            'name' => 'Kaka A',
            'email' => 'kakaa@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Kaka',
        ]);
        User::create([
            'name' => 'Kaka B',
            'email' => 'kakab@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Kaka',
        ]);
    }
}
