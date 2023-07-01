<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LocationGeneral;
use App\Models\Role;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'email',
        'mobile',
        'location',
        'user_role',
        'designation',
    ];


    public function location()
    {
        return $this->belongsTo(LocationGeneral::class, 'location');
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'user_role');
    }
}
