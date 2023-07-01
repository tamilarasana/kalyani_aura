<?php

namespace App\Models;

use App\Models\Member;
use App\Models\Supportticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assign extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'support_ticket_id',
        'assigned_person_id',
        'assigned_to',
        'task_assigned_time',
        'status',
        'remarks',
        'task_solved_time',
    ];

    public function supportTicket()
    {
        return $this->belongsTo(Supportticket::class, 'support_ticket_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'assigned_person_id');
    }
    
    
}
