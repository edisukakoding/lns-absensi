<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function structurOrganization()
    {
        $structur   = \App\Models\StructurOrganization::with(['employee.position', 'boss.position'])->get();
        return \Nette\Utils\Json::encode($structur);
    }

    public function homepage()
    {
        $structure   = \App\Models\StructurOrganization::with(['employee.position', 'boss.position'])->get();

        return view('landing-page.homepage', compact('structure'));
    }
}
