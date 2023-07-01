<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\PostStream;
use App\Models\Supportticket;
use App\Models\Announcement;
use App\Models\LocationGeneral;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    
    const ADMIN_USER='true';
    const REGULAR_USER='false';
    
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'gender',
        'area_of_interest',
        'code',
        'mobile',
        'designation',
        'work_station',
        'working_company',
        'profile_image',
        'spoc',
        'password',
        'admin',
        'location',
        'company',
        'role_id',
        'user_status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function streams()
    {
        return $this->hasMany(PostStream::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ticket()
    {
        return $this->hasMany(Supportticket::class);
    }

      public function announcements()
    {
        return $this->belongsToMany(Announcement::class);
    }
    
    
     public function location()
    {
        return $this->belongsTo(LocationGeneral::class, 'work_station', 'id');
    }
    

    public function userrole(){
        return $this->belongsTo(Userrole::class, 'role_id');
    }

    
}
