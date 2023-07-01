<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Event;
use App\Models\Company;
use App\Models\Alliance;
use App\Models\Announcement;
use App\Models\LocationBank;
use App\Models\LocationBilling;
use App\Models\LocationGeneral;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'area'
        ];

    public function generals()
    {
        $this->hasMany(App\Models\LocationGeneral::class);
    }

    public function billing()
    {
        $this->hasMany(App\Models\LocationBilling::class);
    }

    public function bank()
    {
        $this->hasMany(App\Models\LocationBank::class);
    }

    public function teams()
    {
        $this->hasMany(App\Models\Team::class);
    }

    public function companies()
    {
        $this->hasMany(App\Models\Company::class);
    }

    public function announcement()
    {
        $this->hasMany(App\Models\Announcement::class);
    }

    public function events()
    {
        $this->hasMany(App\Models\Event::class);
    }

    public function alliance()
    {
        $this->hasMany(App\Models\Alliance::class);
    }


}
