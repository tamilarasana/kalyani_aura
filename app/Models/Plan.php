<?php

namespace App\Models;

use App\Models\Inventory;
use App\Models\LocationGeneral;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [    
        'inventory_id',
        'location',
        'description',
        'resource_price',
        'num_seats',
        'area',
        'meeting_room_credits',
        'printer_credits',   
    ];


    public function inventory()
    {
       return $this->belongsTo(Inventory::class);
    }

    public function location()
    {
        return $this->belongsTo(LocationGeneral::class, 'location');
    }
}