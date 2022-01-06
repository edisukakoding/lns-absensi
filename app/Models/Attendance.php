<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'attendance_date',
        'checkin_limit',
        'checkin_time',
        'checkout_limit',
        'checkout_time',
        'employee_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
