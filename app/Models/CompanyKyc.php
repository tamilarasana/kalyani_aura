<?php

namespace App\Models;

use App\Models\CompanyGeneral;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyKyc extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kyc_document_name',
        'file',
        'company_general_id',
    ];
    public function companygeneral()
    {
        $this->belongsTo(App\Models\CompanyGeneral::class);
    }
}
