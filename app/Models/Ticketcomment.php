<?php

namespace App\Models;

use App\Models\Supportticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticketcomment extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'supportticket_id',
        'created_by',
    ];


    public function ticket()
    {
        return $this->belongsTo(Supportticket::class);
    }
}
