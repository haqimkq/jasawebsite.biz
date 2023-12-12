<?php

namespace App\Http\Controllers;

use App\Models\Nameserver;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NameserverController extends Controller
{

    public function index(Request $request, Nameserver $nameserver)
    {

        $data = Nameserver::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <div class="flex justify-center items-center gap-4">
                    <a  style="color: #171dd4c4;" href="/nameserver/' . $row->id . '/edit/" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="m-3 editProduct fa-solid fa-lg fa-pen ">
                    </a>
                    
                    <a style="color: #a80404d1;" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="fa-regular fa-trash-can fa-xl deleteProduct"></a>
                    </div>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('master.nameserver.index', compact('data', 'nameserver'));
    }

    public function create()
    {
        return view('master.nameserver.create');
    }

    public function store(Request $request, Nameserver $nameserver)
    {

        $request->validate(
            [
                'nameserver1' => 'required',
                'nameserver2' => 'required',
                'tanggal_ns' => 'required',
                'status_ns' => 'required',
            ],
        );

        $nameserver = new Nameserver();
        $nameserver->nameserver1 = $request->nameserver1;
        $nameserver->nameserver2 = $request->nameserver2;
        $nameserver->tanggal_ns = $request->tanggal_ns;
        $nameserver->status_ns = $request->status_ns;
        $nameserver->save();

        return redirect()->route('nameserver.index')->with(['success' => 'Nameserver berhasil ditambahkan']);
    }
    public function store2(Request $request, Nameserver $nameserver)
    {

        $request->validate(
            [
                'nameserver1' => 'required',
                'nameserver2' => 'required',
                'tanggal_ns' => 'required',
                'status_ns' => 'required',
            ],
        );

        $nameserver = new Nameserver();
        $nameserver->nameserver1 = $request->nameserver1;
        $nameserver->nameserver2 = $request->nameserver2;
        $nameserver->tanggal_ns = $request->tanggal_ns;
        $nameserver->status_ns = $request->status_ns;
        $nameserver->save();

        return redirect()->back()->with(['success' => 'Nameserver berhasil ditambahkan']);
    }

    public function destroy($id)
    {

        Nameserver::find($id)->delete();
        return response()->json(['success' => 'Nameserver deleted successfully.']);
    }

    public function update(Request $request, Nameserver $nameserver)
    {
        $request->validate(
            [
                'nameserver1' => 'required',
                'nameserver2' => 'required',
                'tanggal_ns' => 'required',
                'status_ns' => 'required',
            ]
        );

        $nameserver->fill($request->post())->save();

        return redirect()->route('nameserver.index')->with(['success' => 'Nameserver berhasil di update']);
    }

    public function edit(Nameserver $nameserver)
    {
        return view('master.nameserver.edit', compact('nameserver'));
    }

    public function show(Nameserver $nameserver)
    {
        return view('master.nameserver.show');
    }

    public function getAddEditRemoveColumn()
    {
        return view('datatables.collection.add-edit-remove-column');
    }
}
