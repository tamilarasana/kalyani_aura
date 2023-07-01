<?php

namespace App\Models;

use App\Models\User;
use App\Models\Reasonvisit;
use App\Models\CompanyGeneral;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;


class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'first_name',
        'last_name',
        'reason_for_visit',
        'company_id',
        'user_id',
        'visit_from',
        'date',
        'time_in',
        'time_out',
        'remarks'
    ];

    public function member(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function company(){
        return $this->belongsTo(CompanyGeneral::class, 'company_id');
    }

    public function reasonvisit(){
        return $this->belongsTo(Reasonvisit::class,'reason_for_visit');
    }




    public function filterByDateRange($startDate, $endDate)
    {
        // Convert start date and end date to local timezone
        $startDate = Carbon::parse($startDate)->startOfDay()->setTimezone(config('app.timezone'));
        $endDate = Carbon::parse($endDate)->endOfDay()->setTimezone(config('app.timezone'));
        // Filter data based on the start date and end date
        return Visitor::whereBetween('created_at', [$startDate, $endDate])
            ->orWhereBetween('updated_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get();
    }

   
}
