<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $employee   = \App\Models\Employee::with('position')->get();
            return DataTables::of($employee)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = "
                    <button 
                        class='btn btn-info btn-sm btn-show' 
                        data-id='{$row->id}' 
                        data-toggle='tooltip' 
                        data-placement='top' 
                        title='Detail'
                        ><i class='fas fa-eye'></i>
                    </button>
                    <a 
                        href='". route('employee.edit', $row->id) ."' 
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
            ->make(true);;
        }

        return view('admin.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        return \Nette\Utils\Json::encode($employee->delete());
    }
}
