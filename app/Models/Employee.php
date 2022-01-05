<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  use HasFactory;

  protected $fillable = [
    'position_id',
    'nik',
    'name',
    'address',
    'gender',
    'active'
  ];

  public function position()
  {
    return $this->belongsTo(Position::class);
  }

  public function user()
  {
    return $this->hasOne(User::class);
  }

  public function attendances()
  {
    return $this->hasMany(Attendance::class);
  }
}
