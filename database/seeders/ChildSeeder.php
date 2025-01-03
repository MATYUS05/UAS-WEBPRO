<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Child;

class ChildSeeder extends Seeder
{
    public function run()
    {
        Child::insert([
            [
                'user_id' => 2,
                'full_name' => 'John Doe',
                'gender' => 'Male',
                'dob' => '2015-03-12',
                'class' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'full_name' => 'Jane Doe',
                'gender' => 'Female',
                'dob' => '2018-07-25',
                'class' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'full_name' => 'Emily Smith',
                'gender' => 'Female',
                'dob' => '2017-11-10',
                'class' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
