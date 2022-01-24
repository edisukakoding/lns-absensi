<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Nette\Utils\Json;
use Yajra\DataTables\DataTables;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $position   = Position::all();
            return DataTables::of($position)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "
                <a 
                    href='" . route('position.edit', $row->id) . "' 
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
        return view('admin.position.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.position.create');
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
            'name' => 'required|unique:positions,name'
        ]);

        $position           = new Position();
        $position->name     = $request->name;
        $position->active   = $request->active == 'on' ? true : false;
        $position->save();
        return redirect('admin/position')->with('success', 'Data Jabatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        return view('admin.position.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $position->name     = $request->name;
        $position->active   = $request->active == 'on' ? true : false;
        $position->save();
        return redirect('admin/position')->with('success', 'Jabatan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        return Json::encode($position->delete());
    }
}
