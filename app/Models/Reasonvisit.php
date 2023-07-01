<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reasonvisit extends Model
{
    use HasFactory;

    protected $fillable = [ 
            'purpose'
    ];
}
