<?php

namespace Database\Factories;

use App\Models\CategoryEvent;
use App\Models\Event;
use App\Models\OrganizerEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence, // Generate a fake event title
            'venue' => $this->faker->city, // Generate a fake city name for the venue
            'date' => $this->faker->date, // Generate a fake date
            'start_time' => $this->faker->time, // Generate a fake time
            'description' => $this->faker->paragraph, // Generate a fake description
            'booking_url' => $this->faker->url, // Generate a fake booking URL
            'tags' => implode(',', $this->faker->words(3)), // Generate fake tags
            'organizer_events_id' => OrganizerEvent::factory(), // Automatically create an associated organizer
            'category_events_id' => CategoryEvent::factory(), // Automatically create an associated category
            'active' => 1, // Default active status
        ];
    }
}
