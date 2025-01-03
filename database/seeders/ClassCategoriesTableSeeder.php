<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassCategories;

class ClassCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ClassCategories::insert([
            [
                'class_name' => 'Preschool',
                'description' => '3-5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class_name' => 'Kindergarten',
                'description' => '5-6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class_name' => 'Elementary School',
                'description' => '7-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class_name' => 'Teens',
                'description' => '13-18',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
