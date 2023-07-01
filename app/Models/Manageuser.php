<?php

namespace App\Models;

use App\Models\Userrole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manageuser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'user_email',
        'role_id',
        'status',
        'password',
    ];

    
    public function userrole(){
        return $this->belongsTo(Userrole::class, 'role_id');
    }

}
