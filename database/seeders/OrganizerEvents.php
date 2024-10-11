<?php

namespace Database\Seeders;

use App\Models\OrganizerEvent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class OrganizerEvents extends Seeder
{
    public function run()
    {
        // Using factory to create 5 organizerEvent
        // OrganizerEvent::factory()->count(5)->create([
        //     'active' => 1 // All organizers will be active
        // ]);

        OrganizerEvent::create([
            'name' => 'Sparkling', 
            'description' => fake()->text(30),
            'facebook_link' => fake()->url(),
            'x_link' => fake()->url(),
            'website_link' => fake()->url(),
            'active' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        OrganizerEvent::create([
            'name' => 'Five Star Organizer', 
            'description' => fake()->text(30),
            'facebook_link' => fake()->url(),
            'x_link' => fake()->url(),
            'website_link' => fake()->url(),
            'active' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        OrganizerEvent::create([
            'name' => 'One Organizer', 
            'description' => fake()->text(30),
            'facebook_link' => fake()->url(),
            'x_link' => fake()->url(),
            'website_link' => fake()->url(),
            'active' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        OrganizerEvent::create([
            'name' => 'Monday Organizer', 
            'description' => fake()->text(30),
            'facebook_link' => fake()->url(),
            'x_link' => fake()->url(),
            'website_link' => fake()->url(),
            'active' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        OrganizerEvent::create([
            'name' => 'Scenery Organizer', 
            'description' => fake()->text(30),
            'facebook_link' => fake()->url(),
            'x_link' => fake()->url(),
            'website_link' => fake()->url(),
            'active' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        OrganizerEvent::create([
            'name' => 'Amazing Organizer', 
            'description' => fake()->text(30),
            'facebook_link' => fake()->url(),
            'x_link' => fake()->url(),
            'website_link' => fake()->url(),
            'active' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 



        
    }
}
