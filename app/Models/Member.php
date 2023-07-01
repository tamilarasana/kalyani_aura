<?php

namespace App\Models;

use App\Models\Visitor;
use App\Models\CompanyGeneral;
use App\Models\LocationGeneral;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
     use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'email',
        'work_station',
        'scope_id',
        'role',
        'mobile',
        'designation',
        'spoc',
        'status',
        'password',
    ];

    public function location()
    {
        return $this->belongsTo(LocationGeneral::class, 'cowork_station');
    }

    public function company()
    {
        return $this->belongsTo(CompanyGeneral::class, 'working_company');
    }


    public function visitor(){
        return $this->hasMany(Visitor::class);
    }
}