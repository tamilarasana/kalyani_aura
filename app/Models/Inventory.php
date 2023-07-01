<?php

namespace App\Models;
use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'hsn_code',
      'res_type',
  ];

  public function plans()
  {
      return $this->hasMany(Plan::class);
  }
}
