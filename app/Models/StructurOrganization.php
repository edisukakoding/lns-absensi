<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructurOrganization extends Model
{
    use HasFactory;

    protected $fillable = ['employee', 'boss'];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee');
    }

    public function boss()
    {
        return $this->hasOne(Employee::class, 'id', 'boss');
    }
}
