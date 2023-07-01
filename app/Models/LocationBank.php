<?php

namespace App\Models;

use App\Models\LocationGeneral;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LocationBank extends Model
{
    use HasFactory;

   
    protected $fillable = [
            'bank_name',
            'account_number',
            'benificiary_name',
            'ifsc',
            'branch',
            'location_general_id',
    ];

    public function location()
    {
        $this->belongsTo(App\Models\LocationGeneral::class);
    }
}
