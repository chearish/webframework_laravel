<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategoryEvents::class);
    
    // Seed organizers second
    $this->call(OrganizerEvents::class);
    
    // Finally, seed events
    $this->call(Events::class);
    }
}
