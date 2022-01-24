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

    public function update(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'email',
            'logo'          => 'image',
            'background'    => 'image'
        ]);

        $data = [
            'name'          => $request->name,
            'visi'          => $request->visi,
            'visi_desc'     => $request->visi_desc,
            'misi'          => $request->misi,
            'location'      => $request->location,
            'email'         => $request->email,
            'telephone'     => $request->telephone,
            'map'           => $request->map,
        ];

        if($request->hasFile('logo')) {
            $data['logo']   = $request->file('logo')->store('public/image/company');
        }
        if($request->hasFile('background')) {
            $data['background'] = $request->file('background')->store('public/images/company');
        }
        \App\Models\Company::where('uid', $request->uid)->update($data);

        return redirect()->back()->with('success', 'Profil di update');

    }
}
