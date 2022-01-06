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
        $last_absen = $employee->attendances()->where('attendance_date', \date('Y-m-d', \strtotime(\now())))->first();
        $work_hours = \App\Models\WorkHour::where('status', 'ACTIVE')->first();
        if ($request->ajax()) {
            return DataTables::of($employee->attendances()->get())->make();
        }

        return view('attendance.index', \compact('employee', 'last_absen', 'work_hours'));
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
        if ($request->ajax()) {
            $work_hours = \App\Models\WorkHour::where('status', 'ACTIVE')->first();
            $attendance = Attendance::where('employee_id', $request->employee_id)->where('attendance_date', \date('Y-m-d', \time()))->first();
            if ($attendance) {
                $attendance->checkout_time  = \date('H:i:s', \time());
                $attendance->save();
            } else {
                $attendance = Attendance::create([
                    'attendance_date' => \now(),
                    'checkin_time'    => \date('H:i:s', \time()),
                    'checkin_limit'   => $work_hours->in,
                    'employee_id'     => $request->employee_id,
                    'checkout_limit'  => $work_hours->out
                ]);
            }
        }
        return \Nette\Utils\Json::encode($attendance);
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
