<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Nameserver;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public const CREATE = '/member/create';
    public function index(User $user, Pelanggan $pelanggan, Request $request, Domain $domain)
    {
        if (Auth::user()->isSupport == true) {
            return redirect()->route('dashboard');
        } else {
            $auth = Auth::user()->id;
            $pelanggans = Pelanggan::with('user')->where('user_id', $auth)->get();
            $domains = count($pelanggans) > 0 ? Domain::where('pelanggan_id', $pelanggans[0]->id)->get() : collect([]);
            $today = Carbon::today();
            $expirationDate = Carbon::parse();
            return view('master.member.member', compact('pelanggans', 'domains', 'today', 'expirationDate'));
        }
    }
    public function create()
    {
        $data = User::all();
        $auth = Auth::user()->id;
        $pelanggans = Pelanggan::with('user')->where('user_id', $auth)->get();
        if (count($pelanggans) > 0) {
            return back();
        } else {
            return view('master.member.create', compact('data'));
        }
    }
    public function store(Request $request, Pelanggan $pelanggan)
    {

        $request->validate(
            [
                'nama_pelanggan' => 'required',
                'alamat' => 'required',
                'no_hp' => [
                    'nullable',
                    function ($attribute, $value, $fail) {
                        $charactersToRemove = ['0', '62'];
                        $cleanedNoHp = ltrim($value, implode('', $charactersToRemove));
                        $combinedNoHp = '62' . $cleanedNoHp;

                        $exists = DB::table('pelanggans')->where('no_hp', $combinedNoHp)->exists();
                        if ($exists) {
                            $fail('Nomor Hp telah digunakan.');
                        }
                    },
                ],
                // 'keterangan_pelanggan' => 'required',
                // 'link_history' => 'required',
                'user_id' => 'required',
            ],
            [
                'no_hp.unique' => 'Nomor Hp telah digunakan .',
            ]

        );
        $charactersToRemove = ['0', '62'];
        $string = ltrim($request->no_hp, implode('', $charactersToRemove));
        // dd($request);

        $pelanggan = new Pelanggan();
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_hp =  '62' . $string;
        $pelanggan->keterangan_pelanggan = $request->keterangan_pelanggan;
        $pelanggan->link_history = $request->link_history;
        $pelanggan->user_id = $request->user_id;
        $pelanggan->image = 'default_image.jpg';
        $pelanggan->save();

        return redirect()->route('member.index');
    }
    public function show(Domain $domain, Pelanggan $pelanggan)
    {
        $data = Domain::with('pelanggan', 'nameserver')->get();
        return view('master.domain.show', compact('data', 'domain'));
    }
}
