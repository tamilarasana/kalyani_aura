<?php

namespace App\Models;

use App\Models\Resourse;
use App\Models\Plan;
use App\Models\LocationBank;
use App\Models\Supportticket;
use App\Models\CompanyGeneral;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LocationGeneral extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_name',
        'area',
        'contact_number',
        'email',
        'business_hours_s',
        'business_hours_e',
         'seating_capacity',
         'state',
         'city',
         'status',
    ];

  public function plans()
  {
      return $this->hasMany(Plan::class);
  }
    public function tickets()
    {
        return $this->hasMany(Supportticket::class);
    }

    public function bank()
    {
        return $this->hasOne(LocationBank::class);
    }

    public function billing()
    {
        return $this->hasOne(LocationBilling::class);
    }

    public function resourse()
    {
        return $this->hasMany(Resourse::class);
    }
    public function companyGeneral()
    {
        return $this->hasMany(CompanyGeneral::class);
    }
   
    
}

