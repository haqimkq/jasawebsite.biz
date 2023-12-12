<?php

namespace App\Http\Controllers;

use App\Models\WaNumber;
use App\Models\Whatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class WhatsappRandomController extends Controller
{

    public function index()
    {
        $wa = Whatsapp::with('number')->get();
        return view('master.whatsapp.index', compact('wa'));
    }
    public function store(Request $request)
    {
        $item = $request->input('item');
        $request->validate(
            [
                'nama' => 'required|unique:whatsapps,nama',
            ],
            [
                'nama.unique' => 'Nama Template Sudah Pernah Digunakan',
            ]
        );


        $wa = new Whatsapp();
        $wa->nama = $request->nama;
        $wa->save();
        foreach ($item as $itemData) {
            $originalNumber = preg_replace('/\s+|-/', '', $itemData['number']);
            $originalNumber = ltrim($originalNumber, '+');

            if (substr($originalNumber, 0, 1) === '0') {
                $replacedNumber = '62' . substr($originalNumber, 1);
            } else {
                $replacedNumber = $originalNumber;
            }

            $itemModel = new WaNumber();
            $itemModel->whatsapp_id = $wa->id;
            $itemModel->number = $replacedNumber;
            $itemModel->save();
        }
        return redirect()->back();
    }
    public function random($nama)
    {

        $data = Whatsapp::where('nama', $nama)->with('number')->first();

        $numbersArray = $data->number->pluck('number')->toArray();

        DB::beginTransaction();

        try {
            $globalSequential = $data::lockForUpdate()->first();

            $whatsappNumbersArray = $numbersArray;

            $nextNumberIndex = ($globalSequential->current_index + 1) % count($whatsappNumbersArray);

            $globalSequential->current_index = $nextNumberIndex;
            $globalSequential->save();

            $nextWhatsappNumber = $whatsappNumbersArray[$nextNumberIndex];
            $whatsappNumberModel = WaNumber::where('number', $nextWhatsappNumber)->first();
            if ($whatsappNumberModel) {
                $whatsappNumberModel->click_count++;
                $whatsappNumberModel->save();
            }

            DB::commit();

            $redirectUrl = 'https://api.whatsapp.com/send?phone=' . $nextWhatsappNumber;

            return redirect()->away($redirectUrl);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Terjadi kesalahan dalam pemrosesan.']);
        }
    }
    public function destroy($id)
    {
        $label = Whatsapp::findOrFail($id);
        $label->delete();
        return redirect()->route('whatsapp.index')->with('success', 'Template Berhasil Dihapus.');
    }
    public function update(Request $request, $whatsapp)
    {
        $item = $request->input('item');
        $request->validate(
            [
                'nama' => 'required'
            ]
        );
        $wa = Whatsapp::findORFail($whatsapp);
        $wa->nama = $request->nama;
        $wa->save();
        $items = WaNumber::where('whatsapp_id', $wa->id);
        $items->delete();
        foreach ($item as $itemData) {
            $originalNumber = preg_replace('/\s+|-/', '', $itemData['number']);
            $originalNumber = ltrim($originalNumber, '+');

            if (substr($originalNumber, 0, 1) === '0') {
                $replacedNumber = '62' . substr($originalNumber, 1);
            } else {
                $replacedNumber = $originalNumber;
            }

            $itemModel = new WaNumber();
            $itemModel->whatsapp_id = $wa->id;
            $itemModel->number = $replacedNumber;
            $itemModel->save();
        }

        return redirect()->route('whatsapp.index')->with(['success' => 'Template berhasil di update']);
    }
    public function edit(Request $request, Whatsapp $whatsapp)
    {
        return view('master.whatsapp.edit', compact('whatsapp'));
    }
}
