<?php

namespace Database\Factories;

use App\Models\OrganizerEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizerEventFactory extends Factory
{
    protected $model = OrganizerEvent::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company, // Generate a fake company name
            'description' => $this->faker->sentence, // Generate a short description
            'facebook_link' => $this->faker->url, // Generate a fake URL
            'x_link' => $this->faker->url, // Generate a fake URL
            'website_link' => $this->faker->url, // Generate a fake URL
            'active' => 1, // Default active status
        ];
    }
}
