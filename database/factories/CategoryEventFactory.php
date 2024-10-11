<?php

namespace Database\Factories;

use App\Models\CategoryEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryEventFactory extends Factory
{
    protected $model = CategoryEvent::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word, // Unique name for the category
            'active' => 1, // Default active status
        ];
    }
}
