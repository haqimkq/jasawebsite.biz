<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Label;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

use function PHPUnit\Framework\fileExists;

class PelangganController extends Controller
{
    public function index(Request $request, Pelanggan $pelanggan)
    {
        $prospek = Pelanggan::where('status', 'prospek')->count();
        $hotProspek = Pelanggan::where('status', 'hotProspek')->count();
        return view('master.pelanggan.index', compact('prospek', 'hotProspek'));
    }
    public function filter(Request $request)
    {
        $filter = $request->input('filter', false);

        if ($filter == 1) {
            $data = Pelanggan::with('user', 'label', 'domain')->where('status', 'prospek')->get();
        } elseif ($filter == 2) {
            $data = Pelanggan::with('user', 'label', 'domain')->where('status', 'hotProspek')->get();
        } else {
            $data = Pelanggan::with('user', 'label', 'domain')->where('status', 'active')->get();
        }

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $isAdmin = Auth::user() &&  Auth::user()->isAdmin == true;
                    $labelsArray = $row->label->pluck('name')->toArray();
                    $labelsJson = json_encode($labelsArray);
                    $labelsJson = htmlspecialchars($labelsJson, ENT_QUOTES, 'UTF-8');
                    $all = Domain::where('pelanggan_id', $row->id)->get()->first();
                    $hasil = $all ? $all->nama_domain : '-';
                    if ($isAdmin) {

                        $btn = '
                        <div class="flex justify-center items-center gap-4">
                        <i style="color: #0b9b01c0;cursor:pointer" class="fa-solid fa-tags fa-xl m-3" data-label="' . $labelsJson . '" data-id="' . $row->id . '" data-modal-trigger="myModal"></i>
                        <a  href="/inv/pelanggan/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Wa"  class="fa-solid fa-file-invoice fa-xl"  ></a>
                        <a style="color: #0b9b01c0;" href="//wa.me/' . $row->no_hp . '/?text=Halo%20Kak%20' . $row->nama_pelanggan . '! Anda%20Memiliki%20Domain%20Yang%20Bernama ' . $hasil . '  " data-toggle="tooltip"  data-id="' . $row->no_hp . '" data-original-title="Wa" class="fa-brands fa-whatsapp fa-xl ml-3" title="Whatsapp" ></a>
                        <a  style="color: #171dd4c4;" href="/pelanggan/' . $row->id . '/edit/" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="m-3 editProduct fa-solid fa-lg fa-pen " title="Edit">
                        </a>
                        
                        <a style="color: #a80404d1;" title="Delete" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="fa-regular fa-trash-can fa-xl deleteProduct"></a>
                    </div>
                    ';
                    } else {
                        $btn = '
                        <div class="flex justify-center items-center gap-4">
                        
                        <a  href="/inv/pelanggan/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Wa"  class="fa-solid fa-file-invoice fa-xl"  ></a>
    
                        <a style="color: #0b9b01c0;" href="//wa.me/' . $row->no_hp . '/?text=Halo%20Kak%20' . $row->nama_pelanggan . '! Anda%20Memiliki%20Domain%20Yang%20Bernama ' . $hasil . '  " data-toggle="tooltip"  data-id="' . $row->no_hp . '" data-original-title="Wa" class="fa-brands fa-whatsapp fa-xl ml-3" title="Whatsapp" ></a>
                    </div>
                    ';
                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        $data = User::all();
        return view('master.pelanggan.create', compact('data'));
    }

    public function store(Request $request, Pelanggan $pelanggan)
    {
        $cleanedNumber = $this->cleanPhoneNumber($request->input('no_hp'));
        $request->validate(
            [
                'nama_pelanggan' => 'required',
                'alamat' => 'required',
                'user_id' => 'required',
                'no_hp' => [
                    'nullable',
                    function ($attribute, $value, $fail) use ($cleanedNumber) {
                        $exists = DB::table('pelanggans')->where('no_hp', $cleanedNumber)->exists();
                        if ($exists) {
                            $fail('Nomor Hp telah digunakan.');
                        }
                    },
                ],
            ]
        );

        $validate_nama_pelanggan = preg_replace('/[^a-zA-Z\s]/', '', $request->nama_pelanggan);
        $pelanggan = new Pelanggan();
        $pelanggan->nama_pelanggan = $validate_nama_pelanggan;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_hp = $cleanedNumber;
        $pelanggan->keterangan_pelanggan = $request->keterangan_pelanggan;
        $pelanggan->link_history = $request->link_history;
        $pelanggan->user_id = $request->user_id;
        $pelanggan->status = $request->status;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = date('YmdHi') . $file->getClientOriginalName();
            $file->move('storage/images/fotoProfil', $nama_file);
            $pelanggan->image = $nama_file;
        } else {
            $pelanggan->image = 'default_image.jpg';
        }
        $pelanggan->save();

        return redirect()->route('pelanggan.index')->with(['success' => 'Pelanggan berhasil ditambahkan']);
    }
    public function store2(Request $request, Pelanggan $pelanggan)
    {
        $cleanedNumber = $this->cleanPhoneNumber($request->input('no_hp'));
        $request->validate(
            [
                'nama_pelanggan' => 'required',
                'alamat' => 'required',
                'no_hp' => [
                    'nullable',
                    function ($attribute, $value, $fail) use ($cleanedNumber) {
                        $exists = DB::table('pelanggans')->where('no_hp', $cleanedNumber)->exists();
                        if ($exists) {
                            $fail('Nomor Hp telah digunakan.');
                        }
                    },
                ],
                'user_id' => 'required',
            ],
        );
        $validate_nama_pelanggan = preg_replace('/[^a-zA-Z\s]/', '', $request->nama_pelanggan);
        $pelanggan = new Pelanggan();
        $pelanggan->nama_pelanggan = $validate_nama_pelanggan;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_hp = $cleanedNumber;
        $pelanggan->keterangan_pelanggan = $request->keterangan_pelanggan;
        $pelanggan->link_history = $request->link_history;
        $pelanggan->user_id = $request->user_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = date('YmdHi') . $file->getClientOriginalName();
            $file->move('storage/images/fotoProfil', $nama_file);
            $pelanggan->image = $nama_file;
        } else {
            $pelanggan->image = 'default_image.jpg';
        }
        $pelanggan->save();

        return back()->with(['success' => 'Pelanggan berhasil ditambahkan']);
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        $file_path = public_path('storage/images/fotoProfil/' . $pelanggan->image);
        if (file_exists($file_path)) {
            if ($pelanggan->image !== 'default_image.jpg') {
                unlink($file_path);
            }
        }

        Pelanggan::find($id)->delete();
        return response()->json(['success' => 'Pelanggan deleted successfully.']);
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $cleanedNumber = $this->cleanPhoneNumber($request->input('no_hp'));
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'no_hp' => [
                'nullable',
                Rule::unique('pelanggans')->ignore($pelanggan->id, 'id')->where(function ($query) use ($cleanedNumber) {
                    $query->where('no_hp', $cleanedNumber);
                }),
            ],
            'user_id' => 'required'
        ]);

        $request->merge(['no_hp' => $cleanedNumber]);
        $file_path = public_path('storage/images/fotoProfil/' . $pelanggan->image);
        if ($request->hasFile('image')) {
            if ($pelanggan->image !== 'default_image.jpg') {
                unlink($file_path);
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = date('YmdHi') . $file->getClientOriginalName();
            $file->move('storage/images/fotoProfil', $nama_file);
            $pelanggan->image = $nama_file;
        }
        $pelanggan->fill($request->post())->save();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diupdate');
    }

    public function getAddEditRemoveColumn()
    {
        return view('datatables.collection.add-edit-remove-column');
    }

    public function edit(Pelanggan $pelanggan)
    {
        $label = Label::all();
        $data = User::all();
        $pelanggans = Pelanggan::all();
        return view('master.pelanggan.edit', compact('pelanggan', 'data', 'pelanggans', 'label'));
    }

    public function show(Pelanggan $pelanggan, Domain $domain)
    {
        $inv = Pelanggan::with('invoice_pelanggan')->get();
        $data = Domain::where('pelanggan_id', $pelanggan->id)->get();
        $hostingCount = Domain::where('onlyHosting', true)->where('pelanggan_id', $pelanggan->id)->with('pelanggan', 'label')->get()->count();
        return view('master.pelanggan.show', compact('pelanggan', 'data', 'domain', 'inv', 'hostingCount'));
    }
    private function cleanPhoneNumber($number)
    {
        $cleanedNumber = preg_replace('/\s+|-/', '', $number);
        $cleanedNumber = preg_replace('/\D/', '', ltrim($cleanedNumber, '+'));

        if (substr($cleanedNumber, 0, 1) === '0') {
            $replacedNumber = '62' . substr($cleanedNumber, 1);
        } else {
            $replacedNumber = $cleanedNumber;
        }

        return $replacedNumber;
    }
}
