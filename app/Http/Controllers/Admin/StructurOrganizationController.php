<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StructurOrganization;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StructurOrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $structur   = StructurOrganization::with(['employee.position', 'boss.position'])->get();
            return DataTables::of($structur)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "
                <a 
                    href='" . route('structurorganization.edit', $row->id) . "' 
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
        return view('admin.structur-organization.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = \App\Models\Employee::all();
        return \view('admin.structur-organization.create', \compact('employees'));
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
            'employee' => 'required',
        ]);

        StructurOrganization::create([
            'employee' => $request->employee,
            'boss' => $request->boss
        ]);

        return \redirect('admin/structurorganization')->with('success', 'Struktur organisasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StructurOrganization  $structurorganization
     * @return \Illuminate\Http\Response
     */
    public function show(StructurOrganization $structurorganization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StructurOrganization  $structurorganization
     * @return \Illuminate\Http\Response
     */
    public function edit(StructurOrganization $structurorganization)
    {
        $employees = \App\Models\Employee::all();
        return \view('admin.structur-organization.edit', \compact('structurorganization', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StructurOrganization  $structurorganization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StructurOrganization $structurorganization)
    {
        $request->validate([
            'employee' => 'required|numeric'
        ]);

        $structurorganization->employee = $request->employee;
        $structurorganization->boss     = $request->boss;
        $structurorganization->save();

        return \redirect('admin/structurorganization')->with('success', 'Struktur organisasi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StructurOrganization  $structurorganization
     * @return \Illuminate\Http\Response
     */
    public function destroy(StructurOrganization $structurorganization)
    {
        return $structurorganization->delete();
    }
}
