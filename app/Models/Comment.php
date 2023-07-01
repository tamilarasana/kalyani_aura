<?php

namespace App\Models;

use App\Models\User;
use App\Models\PostStream;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_description',
        'post_stream_id',
        'user_id',
    ];
    
    public function stream()
    {
        return $this->belongsTo(PostStream::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}

