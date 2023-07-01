<?php

namespace App\Models;

use App\Models\Role;
use App\Models\LocationGeneral;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'email',
        'mobile',
        'location_id',
        'role_id',
        'designation',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function location()
    {
        return $this->belongsTo(LocationGeneral::class);
    }

}
