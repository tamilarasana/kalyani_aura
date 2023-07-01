<?php

namespace App\Models;

use App\Models\CompanyBilling;
use App\Models\CompanySpoc;
use App\Models\CompanyKyc;
use App\Models\LocationGeneral;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyGeneral extends Model
{
    use HasFactory;

    protected $fillable = [
    'company_name',
    'company_email',
    'contact_number',
    'web_url',
    'location',
    'reference',
    'status'
    ];

    public function billings()
    {
       return $this->hasOne(CompanyBilling::class);
    }
    public function spoc()
    {
       return $this->hasOne(CompanySpoc::class);
    }
    public function kyc()
    {
       return $this->hasMany(CompanyKyc::class);
    }

    public function locations()
    {
       return $this->belongsTo(LocationGeneral::class, 'location');
    }
}
