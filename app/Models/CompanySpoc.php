<?php

namespace App\Models;

use App\Models\CompanyGeneral;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanySpoc extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'email',
        'company_general_id'
    ];

    public function companies()
    {
        $this->belongsTo(App\Models\CompanyGeneral::class);
    }
}
