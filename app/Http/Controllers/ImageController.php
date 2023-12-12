<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        if (Auth::user()->isSupport == true) {
            return redirect()->route('dashboard');
        } else {
            $data = Image::all();
            return view('welcome', compact('data'));
        }
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'files' => 'required',
            ]
        );
        $files = $request->file('files');
        if ($request->hasFile('files')) {
            foreach ($files as $file) {
                $nama_file = $file->getClientOriginalName();
                $file->move('storage/images', $nama_file);
                $image = new Image();
                $image->file = $nama_file;
                $image->nama = $nama_file;
                $image->save();
            }
        }
        return back();
    }
    public function delete(Request $request)
    {

        $image = Image::find($request->id);
        $file_path = public_path('storage/images/' . $image->file);
        unlink($file_path);
        Image::where("id", $image->id)->delete();

        return back()->with("success", "Image deleted successfully.");
    }
}
