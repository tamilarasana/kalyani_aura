<?php

namespace App\Models;

use App\Models\User;
use App\Models\Spam;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostStream extends Model
{
    use HasFactory;

    
    protected $fillable = [
            'member_id',
            'description',
            'image',
            'post_status',
            'delete_status',
    ];

    protected $primaryKey='id';
    protected $hidden = [
      'pivot'
    ];
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function user()
    {
       return $this->belongsToMany(User::class);
       
    }   
    public function comments()
    {
       return $this->hasMany(Comment::class);
       
    }  
    public function likes()
    {
        return $this->belongsToMany(User::class);
    }   
     public function spams()
    {
       return $this->hasMany(Spam::class);
       
    }  

}
