<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Label;
use App\Models\LabelDomain;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class LabelController extends Controller
{

    public function index()
    {
        $pelanggan = Pelanggan::all();
        $label = Label::with('pelanggan')->get();
        return view('master.label.index', compact('label', 'pelanggan'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'color' => 'required',
            ],
        );
        // dd($request);

        $label = new Label();
        $label->name = $request->name;
        $label->color = $request->color;
        $label->save();

        return redirect()->back()->with(['success' => 'Label berhasil ditambahkan']);
    }

    public function update(Request $request, Label $label)
    {
        $request->validate(
            [
                'name' => 'required',
                'color' => 'required',
            ]
        );
        // dd($label);
        $label->fill($request->post())->save();

        return redirect()->route('label.index')->with(['success' => 'Label berhasil di update']);
    }
    public function edit(Label $label)
    {
        return view('master.label.edit', compact('label'));
    }
    public function storeEdit(Pelanggan $pelanggan, Request $request)
    {

        $label = Label::all();
        // dd($request);
        return view('master.label.editlabel', compact('pelanggan', 'label'));
    }
    public function storeLabel(Request $request, Pelanggan $pelanggan)
    {
        $labels = $request->input('labels', []);
        $pelanggan->label()->sync($labels);
        return redirect()->route('pelanggan.index')->with('success', 'Berhasil Menyimpan Perubahan.');
    }
    public function labelPelanggan(Request $request, Label $label)
    {
        $pelanggans = $request->input('pelanggans', []);
        $label->pelanggan()->sync($pelanggans);
        return redirect()->route('label.index')->with('success', 'Berhasil Menyimpan Perubahan.');
    }
    public function destroy($id)
    {
        $label = Label::findOrFail($id);
        $label->delete();
        return redirect()->back()->with('success', 'Label Berhasil Dihapus.');
    }
}
