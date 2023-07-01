<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function billings()
    {
        $this->hasMany(App\Models\CompanyBilling::class);
    }

    public function generals()
    {
        $this->hasMany(App\Models\CompanyGenerals::class);
    }

    public function kyc()
    {
        $this->hasMany(App\Models\CompanyGenerals::class);
    }

    public function spoc()
    {
        $this->hasMany(App\Models\CompanySpoc::class);
    }

}
