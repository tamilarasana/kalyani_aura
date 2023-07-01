<?php

namespace App\Models;

use App\Models\User;
use App\Models\Assign;
use App\Models\Ticketcomment;
use App\Models\LocationGeneral;
use App\Models\Supportsubcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supportticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_category_id',
        'user_id',
        'location_id',
        'ticket_description',
        'image',
        'status',
        'location_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Supportsubcategory::class, 'sub_category_id');
    }

    public function location()
    {
        return $this->belongsTo(LocationGeneral::class);
    }
    
    public function message()
    {
        return $this->hasMany(Ticketcomment::class);
    }
    
    public function assignedPerson()
    {
        return $this->hasOne(Assign::class, 'support_ticket_id');
    }

   public function comment()
    {
        return $this->hasMany(Ticketcomment::class)->orderBy('created_at', 'DESC');
    }
}
