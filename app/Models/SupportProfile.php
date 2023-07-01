<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'add_new_issue',
    ];

    protected $hidden = [
        'pivot'
    ];

    
}
