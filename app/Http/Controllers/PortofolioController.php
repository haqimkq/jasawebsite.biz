<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PortofolioController extends Controller
{
    public function porto()
    {
        $data = Image::all();
        return view('master.portofolio.portofolio', compact('data'));
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = Image::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {


                    $btn = '<button data-modal-target="ajaxModel" data-modal-toggle="ajaxModel" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit bg-gray-200 editProduct"><a href="javascript:void(0)" >Edit </a></Button>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('master.portofolio.index');
    }

    public function store(Request $request, Image $image)
    {

        $request->validate(
            [
                'nama' => 'required',
            ],

        );
        // dd($request);
        $file = $request->get('file');
        $image->fill($request->post())->save();

        return redirect()->route('portofolio')->with(['success' => 'Domain berhasil ditambahkan']);
    }

    public function destroy(Image $image)
    {
        $file_path = public_path('storage/images/' . $image->file);
        unlink($file_path);
        $image->delete();

        return redirect()->route('portofolio.index')
            ->with('success', 'Product deleted successfully');
    }

    public function edit($id)
    {
        $image = Image::find($id);
        return response()->json($image);
    }
}
