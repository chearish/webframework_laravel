<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\CategoryEvent;
use App\Models\EventCategory;
use App\Models\OrganizerEvent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class Events extends Seeder
{
    public function run()
    {
        // Create 6 events, randomly assigning existing organizers and categories
        // Event::factory()->count(6)->create([
        //     'organizer_events_id' => OrganizerEvent::all()->random()->id, // Assign random organizer
        //     'category_events_id' => CategoryEvent::all()->random()->id, // Assign random category
        //     'active' => 1 // All events will be active
        // ]);

        Event::create([
            'title' => 'Petra Cantare Choral Festival 2025', 
            'venue' => 'Petra Christian University',
            'date' => '2025-02-17',
            'start_time' => '09:00:00',
            'description' => 'The Petra Cantare International Choral Festival 2025 will take place in Surabaya, Indonesia, hosted by Petra Christian University (PCU). This festival aims to gather choirs from various countries, offering a platform for cultural exchange and showcasing vocal talent. It is part of the universitys ongoing efforts to promote choral music and strengthen international ties within the choral community',
            'booking_url' => 'petra.id/petracantare2025', 
            'tags' => 'Choir, Surabaya Choir, Choral Festival',
            'organizer_events_id' => OrganizerEvent::all()->random()->id, // Assign random organizer
            'category_events_id' => 1, // Assign random category
            'active' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        Event::create([
            'title' => 'Indonesia Innovation Challenge 2024 Powered by Launch Pad', 
            'venue' => 'Jatim Expo',
            'date' => '2024-10-23',
            'start_time' => '09:00:00',
            'description' => fake()->text(30),
            'booking_url' => fake()->url(), 
            'tags' => 'Innovation Challenge, Surabaya Science & Tech Events',
            'organizer_events_id' => OrganizerEvent::all()->random()->id, // Assign random organizer
            'category_events_id' => 1,
            'active' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        Event::create([
            'title' => 'Kids Education Expo 2024', 
            'venue' => 'The Westin',
            'date' => '2024-10-21',
            'start_time' => '09:00:00',
            'description' => fake()->text(30),
            'booking_url' => fake()->url(), 
            'tags' => 'Kids, Expo, Surabaya Expo',
            'organizer_events_id' => OrganizerEvent::all()->random()->id, // Assign random organizer
            'category_events_id' => 1, // Assign random category
            'active' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        Event::create([
            'title' => 'Surabaya Great Expo 2024',
            'venue' => 'Grand City Surabaya',
            'date' => '2024-10-16',
            'start_time' => '08:00:00',
            'description' => fake()->text(30),
            'booking_url' => fake()->url(), 
            'tags' => 'Surabaya Expo',
            'organizer_events_id' => OrganizerEvent::all()->random()->id, // Assign random organizer
            'category_events_id' => 1, // Assign random category
            'active' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        Event::create([
            'title' => 'SMEX (Surabaya Music, Multimedia, and Lighting Expo 2024',
            'venue' => 'Grand City Surabaya',
            'date' => '2024-9-29',
            'start_time' => '08:00:00',
            'description' => fake()->text(30),
            'booking_url' => fake()->url(), 
            'tags' => 'Music Expo Surabya, Lighting, Multimedia',
            'organizer_events_id' => OrganizerEvent::all()->random()->id, // Assign random organizer
            'category_events_id' => 1, // Assign random category
            'active' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        Event::create([
            'title' => 'Japan Edu Expo 2024', 
            'venue' => 'Hotel Said',
            'date' => '2024-9-22',
            'start_time' => '08:00:00',
            'description' => fake()->text(30),
            'booking_url' => fake()->url(), 
            'tags' => 'Surabaya Expo, Education Expo, Study Japan',
            'organizer_events_id' => OrganizerEvent::all()->random()->id, // Assign random organizer
            'category_events_id' => 1, // Assign random category
            'active' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        Event::create([
            'title' => 'Surabaya Hospital Expo 2024', 
            'venue' => 'Grand City Surabaya',
            'date' => '2024-10-11',
            'start_time' => '08:00:00',
            'description' => fake()->text(30),
            'booking_url' => fake()->url(), 
            'tags' => 'Hospital Expo, Surabaya Expo',
            'organizer_events_id' => OrganizerEvent::all()->random()->id, // Assign random organizer
            'category_events_id' => 1, // Assign random category
            'active' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 
    }
}
