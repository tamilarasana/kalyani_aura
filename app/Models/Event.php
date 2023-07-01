<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'organiser',
        'event_title',
        'event_date',
        'status',
        'description',
        'event_image',
        'source_link',
        'start_time',
        'end_time',
    ];

    public function locations()
    {
        $this->belongsTo(App\Models\Location::class);
    }

}


