<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CompanyDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $companydetail   = \App\Models\CompanyDetail::with('company')->get();
            return DataTables::of($companydetail)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "
                    <button 
                        class='btn btn-info btn-sm btn-show' 
                        data-id='{$row->id}' 
                        data-toggle='tooltip' 
                        data-placement='top' 
                        title='Detail'
                        ><i data-id='{$row->id}' class='fas fa-eye btn-show'></i>
                    </button>
                    <a 
                        href='" . route('companydetail.edit', $row->id) . "' 
                        class='btn btn-warning btn-sm'
                        data-toggle='tooltip' 
                        data-placement='top' 
                        title='Edit'
                        ><i class='fas fa-pencil-alt'></i>
                    </a>
                    <button 
                        class='btn btn-danger btn-sm btn-delete' 
                        data-id='{$row->id}'
                        data-toggle='tooltip' 
                        data-placement='top' 
                        title='Hapus'
                        ><i data-id='{$row->id}' class='fas fa-trash-alt btn-delete'></i>
                    </button>
                ";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.settings.company-detail.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.company-detail.create', [
            'companies' => \App\Models\Company::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'          => 'required',
            'company_id'    => 'required',
            'title'         => 'required',
            'content'       => 'required',
            'image'         => 'required|image'
        ]);

        CompanyDetail::create([
            'type'          => $request->type,
            'company_id'    => $request->company_id,
            'title'         => $request->title,
            'content'       => $request->content,
            'image'         => $request->file('image')->store('public/images/company')
        ]);

        return redirect('admin/setting/companydetail')->with('success', 'Konten berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyDetail  $companyDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyDetail $companydetail)
    {
        return view('admin.settings.company-detail._modal', compact('companydetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyDetail  $companyDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyDetail $companydetail)
    {
        $companies = \App\Models\Company::all();
        return view('admin.settings.company-detail.edit', compact('companydetail', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyDetail  $companyDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyDetail $companydetail)
    {
        $request->validate([
            'type'          => 'required',
            'company_id'    => 'required',
            'title'         => 'required',
            'content'       => 'required',
            'image'         => 'image'
        ]);

        $companydetail->type        = $request->type;
        $companydetail->company_id  = $request->company_id;
        $companydetail->title       = $request->title;
        $companydetail->content     = $request->content;
        if($request->hasFile('image')) {
            \Illuminate\Support\Facades\Storage::delete($companydetail->image);
            $companydetail->image       = $request->file('image')->store('public/images/company');
        }
        $companydetail->save();
        return redirect('admin/setting/companydetail')->with('success', 'Konten berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyDetail  $companyDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyDetail $companydetail)
    {
        return $companydetail->delete();
    }
}
