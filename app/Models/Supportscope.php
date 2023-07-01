<?php

namespace App\Models;

use App\Models\Memer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supportscope extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'scope_name',
        ];
        
        
        public function teams()
        {
            return $this->hasMany(Member::class);
        }
}
