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
    if ($request->ajax()) {
      $employee   = \App\Models\Employee::with('position')->get();
      return DataTables::of($employee)
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
                        href='" . route('employee.edit', $row->id) . "' 
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

    return view('admin.employee.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.employee.create', [
      'positions' => \App\Models\Position::where('active', true)->get()
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
      'position_id' => 'numeric|required|exists:positions,id',
      'gender' => 'required',
      'name' => 'required|max:100|min:2',
      'nik' => 'required|max:16|min:16|unique:employees,nik',
    ]);

    $employee = new Employee();
    $employee->position_id  = $request->position_id;
    $employee->gender       = $request->gender;
    $employee->name         = trim($request->name);
    $employee->nik          = trim($request->nik);
    $employee->address      = trim($request->address);
    $employee->active       = $request->active == 'on' ? true : false;
    $employee->save();
    return redirect('admin/employee')->with('success', 'Data berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Employee  $employee
   * @return \Illuminate\Http\Response
   */
  public function show(Employee $employee)
  {
    return view('admin.employee._modal', compact('employee'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Employee  $employee
   * @return \Illuminate\Http\Response
   */
  public function edit(Employee $employee)
  {
    // dd($employee);
    return view('admin.employee.edit', [
      'positions' => \App\Models\Position::where('active', true)->get(),
      'employee' => $employee
    ]);
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
    $request->validate([
      'position_id' => 'numeric|required|exists:positions,id',
      'gender' => 'required',
      'name' => 'required|max:100|min:2',
      'nik' => 'required|max:16|min:16',
    ]);

    $employee->position_id  = $request->position_id;
    $employee->gender       = $request->gender;
    $employee->name         = trim($request->name);
    $employee->nik          = trim($request->nik);
    $employee->address      = trim($request->address);
    $employee->active       = $request->active == 'on' ? true : false;
    $employee->save();
    return redirect('admin/employee')->with('success', 'Data berhasil diupdate');
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
