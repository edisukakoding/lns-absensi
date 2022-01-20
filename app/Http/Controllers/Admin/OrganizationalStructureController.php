<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrganizationalStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $organizationalstructure   = OrganizationalStructure::with(['employee.position', 'boss.position'])->get();
            return DataTables::of($organizationalstructure)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "
                <a 
                    href='" . route('organizationalstructure.edit', $row->id) . "' 
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
        return view('admin.organizational-structure.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = \App\Models\Employee::all();
        return \view('admin.organizational-structure.create', \compact('employees'));
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

        OrganizationalStructure::create([
            'employee' => $request->employee,
            'boss' => $request->boss
        ]);

        return \redirect('admin/organizationalstructure')->with('success', 'Struktur organisasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrganizationalStructure  $organizationalstructure
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationalStructure $organizationalstructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrganizationalStructure  $OrganizationalStructure
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationalStructure $organizationalstructure)
    {
        $employees = \App\Models\Employee::all();
        return \view('admin.organizational-structure.edit', \compact('organizationalstructure', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrganizationalStructure  $organizationalstructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganizationalStructure $organizationalstructure)
    {
        $request->validate([
            'employee' => 'required|numeric'
        ]);

        $organizationalstructure->employee = $request->employee;
        $organizationalstructure->boss     = $request->boss;
        $organizationalstructure->save();

        return \redirect('admin/OrganizationalStructure')->with('success', 'Struktur organisasi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrganizationalStructure  $OrganizationalStructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationalStructure $organizationalstructure)
    {
        return $organizationalstructure->delete();
    }
}
