<?php

namespace App\Models;

use App\Models\CompanyGeneral;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyBilling extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cin',
        'pan',
        'gstn',
        'tan',
        'billing_address',
        'company_general_id',
       
    ];

    // public function companies()
    // {
    //     $this->belongsTo(App\Models\Company::class);
    // }
    public function companies()
    {
        $this->belongsTo(App\Models\CompanyGeneral::class,'company_general_id');
    }
}
