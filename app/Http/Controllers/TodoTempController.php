<?php

namespace App\Http\Controllers;

use App\Models\TodoTemp;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TodoTempController extends Controller
{
    public function index(Request $request)
    {
        $data = TodoTemp::with('domains', 'from')->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                            <div class="flex items-center justify-center gap-2">
                            
                            <a style="color: #a80404d1;" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="fa-regular fa-trash-can fa-xl deleteProduct">
                            </a>
                        </div>
                        ';


                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('master.todoTemp.index');
    }
    public function destroy(TodoTemp $todoTemp)
    {
        $todoTemp->delete();
        return response('Todo Berhasil Dihapus');
    }
}
