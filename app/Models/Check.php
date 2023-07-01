<?php

namespace App\Models;

use App\Models\Userrole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Check extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'reason_for_visit',
        'visitor_from',
        'date_check_in',
        'time_check_in',
        'time_check_out'
    ];

    public function userrole(){
        return $this->belongsTo(Userrole::class, 'role_id');
    }



}
