<?php

namespace App\Http\Controllers;

use App\Models\FileTodo;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FileTodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Todo $todo)
    {
        return view('components.file-todo-container', compact('todo'));
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
    public function store(Request $request, Todo $todo)
    {
        if ($request->hasFile('files')) {
            $files = $request->file('files');

            foreach ($files as $file) {
                $file->move('storage/todo/file/', '{' . date('YmdHi') . '}' . $file->getClientOriginalName());
                $files = new FileTodo();
                $files->nama_file = '{' . date('YmdHi') . '}' . $file->getClientOriginalName();
                $files->save();
                $todo->file()->syncWithoutDetaching($files);
            }

            return response()->json(['message' => 'Upload successful']);
        }

        return response($todo);
    }

    /**
     * Display the specified resource.
     */
    public function show(FileTodo $fileTodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FileTodo $fileTodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FileTodo $fileTodo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FileTodo $fileTodo)
    {
        $path = public_path('storage/todo/file/' . $fileTodo->nama_file);
        unlink($path);
        $fileTodo->delete();
        return response('File Berhasil Dihapus');
    }
    public function download(FileTodo $fileTodo)
    {
        $path = public_path('storage/todo/file/' . $fileTodo->nama_file);
        return Response::download($path);
    }
}
