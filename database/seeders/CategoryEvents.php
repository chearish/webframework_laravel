<?php

namespace Database\Seeders;

use App\Models\CategoryEvent;
use App\Models\EventCategory;
use Illuminate\Database\Seeder;

class CategoryEvents extends Seeder
{
    public function run()
    {
        CategoryEvent::create(['name' => 'Expo', 'active' => 1]);
        CategoryEvent::create(['name' => 'Concert', 'active' => 1]);
        CategoryEvent::create(['name' => 'Conference', 'active' => 1]);
    }
}
