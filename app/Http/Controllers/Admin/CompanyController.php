<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $company    = \App\Models\Company::first();
        return view('admin.settings.company.index', compact('company'));
    }
}
