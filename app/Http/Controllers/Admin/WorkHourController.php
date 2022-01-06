<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkHour;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WorkHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $workhour   = WorkHour::all();
            return DataTables::of($workhour)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "
                <a 
                    href='" . route('workhours.edit', $row->id) . "' 
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
        return \view('admin.settings.workhour.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.settings.workhour.create');
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
            'in' => 'required',
            'out' => 'required',
            'break' => 'required',
        ]);

        if ($request->status == 'on') {
            WorkHour::where('status', 'ACTIVE')->update(['status' => 'INACTIVE']);
        }
        $workhour           = new WorkHour();
        $workhour->in       = $request->in;
        $workhour->out      = $request->out;
        $workhour->break    = $request->break;
        $workhour->status   = $request->status == 'on' ? 'ACTIVE' : 'INACTIVE';
        $workhour->save();
        return redirect('admin/setting/workhours')->with('success', 'Jam kerja berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkHour  $workHour
     * @return \Illuminate\Http\Response
     */
    public function show(WorkHour $workhour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkHour  $workHour
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkHour $workhour)
    {
        return \view('admin.settings.workhour.edit', \compact('workhour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkHour  $workHour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkHour $workhour)
    {
        $request->validate([
            'in' => 'required',
            'out' => 'required',
            'break' => 'required',
        ]);

        if ($request->status == 'on') {
            WorkHour::where('status', 'ACTIVE')->update(['status' => 'INACTIVE']);
        }
        $workhour->in       = $request->in;
        $workhour->out      = $request->out;
        $workhour->break    = $request->break;
        $workhour->status   = $request->status == 'on' ? 'ACTIVE' : 'INACTIVE';
        $workhour->save();
        return redirect('admin/setting/workhours')->with('success', 'Jam kerja berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkHour  $workHour
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkHour $workhour)
    {
        return \Nette\Utils\Json::encode($workhour->delete());
    }
}
