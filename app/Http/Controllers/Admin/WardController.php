<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Population;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WardController extends Controller
{
    public function population(Request $request)
    {
        if ($request->ajax()) {
            $population   = Population::all();
            return DataTables::of($population)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "
                <a 
                    href='" . route('population.edit', $row->id) . "' 
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
        return view('admin.population.index');
    }

    public function population_create()
    {
        return \view('admin.population.create');
    }

    public function population_store(Request $request)
    {
        $request->validate([
            'year' => 'required:numeric',
            'man' => 'required:numeric',
            'woman' => 'required:numeric',
            'child' => 'numeric',
            'baby' => 'numeric',
        ]);

        Population::create(\array_merge($request->all(), ['total' => $request->man + $request->woman + $request->child + $request->baby]));
        return redirect('admin/population')->with('success', 'Data Jumlah Penduduk berhasil ditambahkan');
    }

    public function population_edit(Population $population)
    {
        return \view('admin.population.edit', \compact('population'));
    }

    public function population_update(Request $request, Population $population)
    {
        $request->validate([
            'year' => 'required:numeric',
            'man' => 'required:numeric',
            'woman' => 'required:numeric',
            'child' => 'numeric',
            'baby' => 'numeric',
        ]);

        $population->year   = $request->year;
        $population->man    = $request->man;
        $population->woman  = $request->woman;
        $population->child  = $request->child;
        $population->baby   = $request->baby;
        $population->total  = $request->man + $request->woman + $request->child + $request->baby;
        $population->save();
        return redirect('admin/population')->with('success', 'Data Jumlah Penduduk berhasil diupdate');
    }

    public function population_destroy(Population $population)
    {
        return \Nette\Utils\Json::encode($population->delete());
    }

    public function population_api()
    {
        return \Nette\Utils\Json::encode(Population::orderBy('year')->get());
    }
}
