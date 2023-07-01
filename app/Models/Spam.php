<?php

namespace App\Models;

use App\Models\PostStream;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spam extends Model
{
    use HasFactory;

    protected $fillable = [
        'stream_id',
        'user_id',
        'description',
        'status',
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function stream()
    {
       return $this->belongsTo(PostStream::class, 'stream_id');
    }
}
