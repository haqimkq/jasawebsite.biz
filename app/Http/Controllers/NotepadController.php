<?php

namespace App\Http\Controllers;

use App\Models\Notepad;
use Illuminate\Http\Request;

class NotepadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notepad = Notepad::all();
        return view('master.notepad.index', compact('notepad'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $notepad = new Notepad();
        $notepad->notepad = $request->notepad;
        $notepad->save();
        return redirect()->back()->with(['success' => 'Notepad Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Notepad $notepad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notepad $notepad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notepad $notepad)
    {
        $notepad->notepad = $request->notepad;
        $notepad->save();
        return response('Notepad Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notepad $notepad)
    {
        $notepad->delete();
        return redirect()->back()->with(['success' => 'Notepad Berhasil Dihapus']);
    }
}
