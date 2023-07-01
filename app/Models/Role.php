<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
    ];
    
    public function resourse()
    {
        return $this->hasMany(Resourse::class);
    }
    
    public function team()
    {
        return $this->hasMany(\App\Models\Team::class);
    }
}
