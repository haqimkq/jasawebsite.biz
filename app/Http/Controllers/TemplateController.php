<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function website()
    {
        $template = Template::all();
        return view('master.template.template', compact('template'));
    }
    public function index()
    {
        $template = Template::all();
        return view('master.template.index', compact('template'));
    }
    public function create()
    {
        return view('master.template.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'image' => 'required',
                'nama_template' => 'required',
                'link' => 'required',
                'harga' => 'required',
            ],
            [
                'image.required' => 'Gambar Thumbnail belum di tambahkan',
            ]
        );
        $template = new Template();
        $template->nama_template = $request->nama_template;
        $template->link = $request->link;
        $template->harga = $request->harga;
        $file = $request->file('image');
        $nama_file = date('YmdHi') . $file->getClientOriginalName();
        $file->move('storage/images/template', $nama_file);
        $template->image = $nama_file;
        $template->save();

        return redirect()->route('daftartemplate.index');
    }
    public function destroy($id)
    {
        $template = Template::find($id);
        $file_path = public_path('storage/images/template/' . $template->image);
        if (file_exists($file_path)) {
            if ($template->image !== 'default.png') {
                unlink($file_path);
            }
        }

        $template->delete();
        return back();
    }
    public function edit(Template $daftartemplate)
    {
        return view('master.template.edit', compact('daftartemplate'));
    }
    public function update(Template $daftartemplate, Request $request)
    {
        // dd($request);
        if ($request->has('show_harga')) {
            $request->merge(['show_harga' => 1]);
        } else {
            $request->merge(['show_harga' => 0]);
        }
        $request->validate(
            [
                'nama_template' => 'required',
                'link' => 'required',
                'harga' => 'required',
            ]
        );
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = date('YmdHi') . $file->getClientOriginalName();
            $file->move('storage/images/template', $nama_file);
            unlink(public_path('storage/images/template/' . $daftartemplate->image));
            $daftartemplate->image = $nama_file;
            $daftartemplate->save();
        }
        $daftartemplate->fill($request->post())->save();

        return redirect()->route('daftartemplate.index')->with(['success' => 'Label berhasil di update']);
    }
}
