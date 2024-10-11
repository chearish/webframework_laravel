<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizerEvent extends Model
{
    use HasFactory;

    protected $table = 'organizer_events'; // Ganti jika tabel Anda memiliki nama lain

    protected $fillable = [
        'name',
        'description',
        'facebook_link',
        'x_link',
        'website_link',
        'active',
    ];

    // Relationship with Event
    public function events()
    {
        return $this->hasMany(Event::class, 'organizer_events_id');
    }
}
