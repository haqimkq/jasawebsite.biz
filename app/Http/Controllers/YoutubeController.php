<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Youtube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YoutubeController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin == true) {
            $youtube = Youtube::all();
        } else {
            $youtube = Youtube::whereHas('users', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->get();
        }
        $user = User::where('isSupport', true)->where('isAdmin', false)->get();
        return view('master.youtube.index', compact('user', 'youtube'));
    }
    public function store(Request $request)
    {
        $url = $request->link;
        $segments = explode("/", $url);
        $url = 'https://www.youtube.com/embed/' . end($segments);
        $youtube = new Youtube();
        $youtube->link = $url;
        $youtube->judul = $request->judul;
        $youtube->deskripsi = $request->deskripsi;
        $youtube->save();
        $youtube->users()->sync($request->user);
        return redirect()->back()->with(['success' => 'Youtube Berhasil Ditambahkan']);
    }
    public function update(Request $request, Youtube $youtube)
    {
        $url = $request->link;
        $segments = explode("/", $url);
        $url = 'https://www.youtube.com/embed/' . end($segments);
        $youtube->link = $url;
        $youtube->judul = $request->judul;
        $youtube->deskripsi = $request->deskripsi;
        $youtube->save();
        $youtube->users()->sync($request->user);
        return redirect()->route('youtube.index')->with(['success' => 'Youtube Berhasil Diedit']);
    }
    public function show(Youtube $youtube)
    {
        $youtubeAll = Youtube::all();
        return view('master.youtube.show', compact('youtube', 'youtubeAll'));
    }
    public function destroy(Youtube $youtube)
    {
        $youtube->delete();
        return redirect()->back()->with(['success' => 'Youtube Berhasil Dihapus']);
    }
    public function edit(Youtube $youtube)
    {
        $user = User::where('isSupport', true)->where('isAdmin', false)->get();
        return view('master.youtube.edit', compact('youtube', 'user'));
    }
}
