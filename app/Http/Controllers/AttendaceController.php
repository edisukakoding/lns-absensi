<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class AttendaceController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $employee   = \App\Models\Employee::with('attendances')->find(Auth::user()->employee_id);
    // dd($employee->attendances()->get());
    if ($request->ajax()) {
      return DataTables::of($employee->attendances()->get())->make();
    }

    return view('attendance.index', \compact('employee'));
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
   * @param  \App\Models\Attendance  $attendance
   * @return \Illuminate\Http\Response
   */
  public function show(Attendance $attendance)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Attendance  $attendance
   * @return \Illuminate\Http\Response
   */
  public function edit(Attendance $attendance)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Attendance  $attendance
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Attendance $attendance)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Attendance  $attendance
   * @return \Illuminate\Http\Response
   */
  public function destroy(Attendance $attendance)
  {
    //
  }
}
