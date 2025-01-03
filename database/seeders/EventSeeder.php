<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\ClassCategories;
use App\Models\User;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        $classes = ClassCategories::all();
        $kakas = User::where('role', 'Kaka')->get();

        if ($classes->isEmpty() || $kakas->isEmpty()) {
            $this->command->info('Seeding skipped. Please ensure there are entries in class_categories and users with role Kaka.');
            return;
        }

        $timeSlots = [
            ['08:30', '10:00'],
            ['10:30', '12:30'],
            ['13:00', '15:00'],
            ['16:00', '18:00'],
        ];

        $events = [
            [
                'name' => 'Class Orientation',
                'description' => 'An introduction to the new semester and guidelines.',
                'location' => 'Auditorium',
            ],
            [
                'name' => 'Sports Day',
                'description' => 'Annual sports day event for all classes.',
                'location' => 'School Ground',
            ],
            [
                'name' => 'Science Fair',
                'description' => 'Showcase of student projects in science and technology.',
                'location' => 'Lab Building',
            ],
            [
                'name' => 'Art Exhibition',
                'description' => 'Display of student artworks and performances.',
                'location' => 'Art Studio',
            ],
        ];

        $today = Carbon::today();

        foreach ($events as $event) {
            foreach ($timeSlots as $slot) {
                Event::create([
                    'name' => $event['name'],
                    'description' => $event['description'],
                    'date' => $today,
                    'time' => $slot[0],
                    'time_end' => $slot[1],
                    'location' => $event['location'],
                    'class_id' => $classes->random()->id,
                    'kaka_id' => $kakas->random()->id,
                ]);
            }
        }

        $this->command->info('Events table seeded successfully with multiple time slots.');
    }
}
