<?php

namespace App\Models;

use App\Models\Supportcategory;
use App\Models\Supportticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supportsubcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'supportcategory_id',
        'sub_category',
        
    ];

    public function category()
    {
        return $this->belongsToMany(Supportcategory::class,'supportcategories');
    }

    // public function category()
    // {
    //     return $this->belongsTo(Supportcategory::class,'supportcategory_id');
    // }


    public function ticket()
    {
        return $this->hasMany(Supportticket::class);
    }
}
