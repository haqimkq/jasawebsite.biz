<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::all();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $isAdmin = $row->isAdmin == 1;
                    $isSupport = $row->isSupport == 1; // Cek jika isAdmin bernilai 1
                    $editBtn = '<a style="color: #171dd4c4;" href="/user/' . $row->id . '/edit/" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="m-3 editProduct fa-solid fa-lg fa-pen " title="Edit"></a>';
                    $deleteBtn = '<a style="color: #a80404d1;" title="Delete" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="fa-regular fa-trash-can fa-xl deleteProduct"></a>';

                    if ($isAdmin) {
                        // Hanya tampilkan tombol edit untuk isAdmin dengan nilai 1
                        $btn = '<div class="flex justify-center items-center gap-4">' . $editBtn . '</div>';
                    } elseif ($isSupport) {
                        $btn = '<div class="flex justify-center items-center gap-4">' . $editBtn . '</div>';
                    } else {
                        // Tampilkan kedua tombol edit dan delete untuk isAdmin dengan nilai selain 1
                        $btn = '<div class="flex justify-center items-center gap-4">' . $editBtn . $deleteBtn . '</div>';
                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('master.user.index', compact('data'));
    }

    public function create()
    {
        return view('master.user.create');
    }
    public function edit(User $user)
    {
        return view('master.user.edit', compact('user'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($request->no_hp) {
            $user->no_hp = $request->no_hp;
        }
        if ($request->role == 'admin') {
            $user->isAdmin = 1;
            $user->isSupport = 1;
            $user->email_verified_at = now()->subDays(rand(1, 30))->subHours(rand(1, 12));
        } elseif ($request->role == 'support') {
            $user->isAdmin = 0;
            $user->isSupport = 1;
            $user->email_verified_at = now()->subDays(rand(1, 30))->subHours(rand(1, 12));
        } else {
            $user->isAdmin = 0;
            $user->isSupport = 0;
        }
        $user->save();
        event(new Registered($user));
        return redirect()->route('user.index');
        // return redirect(RouteServiceProvider::HOME);
    }
    public function store2(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));


        return redirect()->back();
        // return redirect(RouteServiceProvider::HOME);
    }
    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
            ]
        );
        $file_path = public_path('storage/images/fotoProfil/' . $user->image);
        if ($request->hasFile('image')) {
            if ($user->image !== 'default_image.jpg' && $user->image !== null) {
                unlink($file_path);
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = date('YmdHi') . $file->getClientOriginalName();
            $file->move('storage/images/fotoProfil', $nama_file);
            $user->image = $nama_file;
        }
        if ($request->has('isShowPoint')) {
            $user->isShowPoint = true;
        } else {
            $user->isShowPoint = false;
        }
        $user->fill($request->post())->save();
        return redirect()->route('user.index');
    }
    public function destroy($id)
    {

        User::find($id)->delete();
        return response()->json(['success' => 'Pelanggan deleted successfully.']);
    }
}
