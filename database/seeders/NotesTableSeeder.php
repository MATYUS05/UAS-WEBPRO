<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Note;
use App\Models\Child;

class NotesTableSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua anak (children) dari database
        $children = Child::all();

        // Periksa apakah ada data child
        if ($children->isEmpty()) {
            $this->command->warn('No children found. Please seed the children table first.');
            return;
        }

        // Loop setiap anak dan buat beberapa catatan (notes)
        foreach ($children as $child) {
            Note::factory()->count(rand(1, 3))->create([
                'child_id' => $child->id,
            ]);
        }

        $this->command->info('Notes table seeded successfully!');
    }
}
