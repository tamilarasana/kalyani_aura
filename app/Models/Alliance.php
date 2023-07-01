<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alliance extends Model
{
    use HasFactory;

    protected  $fillable = [
        'alligns_title',
        'thumbnail',
        'description',
        'your_image',
        'category',
        'offer_type',
        'coupen_code',
        'email',
        'weburl',
        'status',
        'country',
    ];

    public function locations()
    {
        $this->hasMany(App\Models\Location::class);
    }

    

}



