<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function organizationalstructure()
    {
        $structur   = \App\Models\OrganizationalStructure::with(['employee.position', 'boss.position'])->get();
        return \Nette\Utils\Json::encode($structur);
    }

    public function homepage()
    {
        $structure  = \App\Models\OrganizationalStructure::with(['employee.position', 'boss.position'])->get();
        $company    = \App\Models\Company::first(); 
        $headline   = \App\Models\CompanyDetail::where('type', 'HEADLINE')->first();
        return view('landing-page.homepage', compact('structure', 'company', 'headline'));
    }

    public function profile()
    {
        $company    = \App\Models\Company::first(); 
        $contents   = \App\Models\CompanyDetail::where('type', 'CONTENT')->get();
        return view('/landing-page/profile', compact('contents', 'company'));
    }

    public function contact()
    {
        $company    = \App\Models\Company::first(); 
        return view('/landing-page/contact', compact('company'));
    }
}
