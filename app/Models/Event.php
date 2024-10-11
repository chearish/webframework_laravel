<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'venue',
        'date',
        'start_time',
        'description',
        'booking_url',
        'tags',
        'organizer_events_id',
        'category_events_id',
        'active',
    ];

    // Relationship with Organizer
    public function organizer_events()
    {
        return $this->belongsTo(OrganizerEvent::class,'organizer_events_id');
    }

    // Relationship with EventCategory
    public function category_events()
    {
        return $this->belongsTo(CategoryEvent::class, 'category_events_id');
    }
}
