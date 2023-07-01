<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Announcement extends Model
{
    use HasFactory;

 protected $fillable = [
        'title',
        'location',
        'schedule_time',
        'schedule_date',
        'expiration_time',
        'expiration_date',
        'message',
        'stick_top',
        'image',
    ];

    protected $hidden = [
        'pivot'
      ];

    

    public function interested()
    {
        return $this->belongsToMany(User::class);
    }
    public function locations()
    {
        return $this->belongsTo(LocationGeneral::class, 'location', 'id');
    }
}





