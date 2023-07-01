<?php

namespace App\Models;

use App\Models\Supportsubcategory;
use App\Models\Supportscope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supportcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'scope_id',
    ];


    public function subcategory()
    {
        return $this->hasMany(Supportsubcategory::class);
    }
        public function scope()
    {
        return $this->belongsTo(Supportscope::class);
    }
}
