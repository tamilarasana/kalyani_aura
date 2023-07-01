<?php

namespace App\Models;

use App\Models\LocationGeneral;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LocationBilling extends Model
{
    use HasFactory;

    protected $fillable = [
        'legal_business_name',
        'address',
        'notes_top',
        'notes_bottom',
        'gstn',
        'state',
        'city',
        'location_general_id',
    ];

    public function location()
    {
        $this->belongsTo(App\Models\LocationGeneral::class);
    }
}


