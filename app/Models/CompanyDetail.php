<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    use HasFactory;

    protected 

    $fillable = ['type', 'company_id', 'title', 'content', 'image'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
