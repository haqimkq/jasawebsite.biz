<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\LabelDomain;
use App\Models\Nameserver;
use App\Models\Pelanggan;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class DomainController extends Controller
{
    public function index(Request $request, Domain $domain)
    {
        $hostingCount = Domain::where('onlyHosting', true)->with('pelanggan', 'label')->get()->count();
        $tempDomainCount = Domain::whereDoesntHave('pelanggan')->count();
        $externalDomainCount = Domain::where('externalDomain', true)->count();
        $today = Carbon::today();
        $expirationDate = Carbon::parse($domain->tanggal_expired);
        $data = Domain::with('pelanggan', 'label')->get();
        return view('master.domain.index', compact('data', 'domain', 'expirationDate', 'today', 'hostingCount', 'tempDomainCount', 'externalDomainCount'));
    }

    public function create(Pelanggan $pelanggan, Nameserver $nameserver)
    {
        $vendorDomains = Domain::select('vendor', 'nama_domain')
            ->whereNotNull('vendor')
            ->get()
            ->groupBy('vendor')
            ->keys()
            ->all();
        $data = Pelanggan::all();
        $ns = Nameserver::all();
        return view('master.domain.create', compact('data', 'ns', 'vendorDomains'));
    }

    public function store(Request $request, Domain $domain)
    {
        $request->validate(
            [
                'nama_domain' => 'required|unique:domains,nama_domain',
                'epp_code' => 'nullable|sometimes|unique:domains,epp_code',
                'tanggal_mulai' => 'required',
                'tanggal_expired' => 'required',
            ],
            [
                'nama_domain.unique' => 'Domain telah terdaftar dalam database.',
            ]
        );


        $domain = new Domain();
        $domain->nama_domain = $request->nama_domain;
        $domain->nameserver_id = $request->nameserver_id;
        $domain->tanggal_mulai = $request->tanggal_mulai;
        $domain->tanggal_expired = $request->tanggal_expired;
        $domain->pelanggan_id = $request->input('pelanggan_id');
        $domain->epp_code = $request->epp_code;
        $domain->perpanjangan = $request->perpanjangan;
        $domain->vendor = $request->vendor;
        $domain->keterangan_domain = $request->keterangan_domain;
        $domain->loginUrl = $request->loginUrl;
        $domain->loginUsername = $request->loginUsername;
        $domain->loginPassword = $request->loginPassword;
        $domain->hosting = $request->hosting;
        $domain->kapasitas_hosting = $request->kapasitas_hosting;
        $domain->jumlah_email = $request->jumlah_email;
        $domain->lokasi_hosting = $request->lokasi_hosting;
        $domain->paket_website = $request->paket_website;
        $domain->tanggal_hosting = $request->tanggal_hosting;
        $domain->hidden_epp = '';
        $domain->slug = Str::slug($request->nama_domain) . Str::random(5);
        if ($request->has('statusDomain')) {
            if ($request->statusDomain == 'onlyHosting') {
                $domain->onlyHosting = true;
            } elseif ($request->statusDomain == 'externalDomain') {
                $domain->externalDomain = true;
            }
        }
        $domain->save();
        return redirect()->route('domain.index')->with(['success' => 'Domain berhasil ditambahkan']);
    }

    public function destroy($id)
    {
        Domain::find($id)->delete();
        return response()->json(['success' => 'Domain deleted successfully.']);
    }

    public function update(Request $request, Domain $domain)
    {
        $request->validate([
            'nama_domain' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_expired' => 'required',
        ]);

        $tanggal_mulai = date("Y-m-d", strtotime($request->input('tanggal_mulai')));
        $tanggal_expired = date("Y-m-d", strtotime($request->input('tanggal_expired')));
        if ($request->onlyHosting == 'on') {
            $onlyHosting = $domain->onlyHosting = true;
        } else {
            $onlyHosting = $domain->onlyHosting = false;
        }

        $request->merge(['tanggal_mulai' => $tanggal_mulai, 'tanggal_expired' => $tanggal_expired, 'onlyHosting' => $onlyHosting]);
        $domain->fill($request->all())->save();

        return redirect()->route('domain.index')->with(['success' => 'Domain berhasil di update']);
    }


    public function edit(Domain $domain)
    {
        $label = LabelDomain::all();
        $ns = Nameserver::all();
        $data = Pelanggan::all();
        $vendorDomains = Domain::select('vendor', 'nama_domain')
            ->whereNotNull('vendor')
            ->get()
            ->groupBy('vendor')
            ->keys()
            ->all();
        return view('master.domain.edit', compact('data', 'domain', 'ns', 'label', 'vendorDomains'));
    }

    public function show(Domain $domain, $slug)
    {
        $domains = Domain::where('slug', $slug)->first();
        if (!$domains) {
            abort(404);
        }
        $today = Carbon::today();
        $expirationDate = Carbon::parse($domains->tanggal_expired);

        $data = Domain::with('pelanggan', 'nameserver')->get();
        return view('master.domain.show', compact('data', 'domain', 'today', 'expirationDate', 'domains'));
    }

    public function getAddEditRemoveColumn()
    {
        return view('datatables.collection.add-edit-remove-column');
    }
    public function rules()
    {
        return [
            'epp_code' => 'required|unique:domains,epp_code',
            'nama_domain' => 'required|unique:domains,nama_domain',
        ];
    }
    public function searchPelanggan(Request $request)
    {

        $query = $request->input('query');
        if ($query === '') {
            $results = Pelanggan::with('domain');
        } else {
            $results = Pelanggan::where('nama_pelanggan', 'LIKE', '%' . $query . '%')->with('domain')->limit(5)->get();
        }

        return response()->json($results);
    }
    public function activateDomain($id)
    {
        $domain = Domain::findOrFail($id);
        $addyears = Carbon::parse($domain->tanggal_expired)->addYears(1);
        $formattedDate = $addyears->format('d F Y');
        $domain->tanggal_expired = $addyears;
        $domain->save();
        return redirect()->back()->with(['success' => 'Domain ' . $domain->nama_domain . ' Berhasil Diperpanjang Ke ' . $formattedDate]);
    }
    public function getExpiredDomain()
    {
        $today = now();
        $expiredDomains = Domain::where('tanggal_expired', '<', $today)->with('pelanggan')->get();
        return response()->json($expiredDomains);
    }
    public function getExpiredSoonDomain($range)
    {
        $today = now();
        $todays = now();
        $expiryThreshold = $todays->addDays($range);
        $domains = Domain::where('tanggal_expired', '<', $expiryThreshold)
            ->where('tanggal_expired', '>', $today)->with('pelanggan')
            ->get();
        return response()->json($domains);
    }
    public function filter(Request $request, Domain $domain)
    {

        $onlyHosting = $request->input('onlyHosting', false);

        if ($onlyHosting == 1) {
            $data = Domain::where('onlyHosting', true)->with('pelanggan', 'label')->where('externalDomain', false)->get();
        } elseif ($onlyHosting == 2) {
            $data = Domain::whereDoesntHave('pelanggan')->with('pelanggan', 'label')->where('externalDomain', false)->get();
        } elseif ($onlyHosting == 3) {
            $data = Domain::where('externalDomain', true)->with('pelanggan', 'label')->get();
        } else {
            $data = Domain::with('pelanggan', 'label')->where('externalDomain', false)->get();
        }

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $isAdmin = Auth::user() &&  Auth::user()->isAdmin == true;
                    $labelsArray = $row->label->pluck('name')->toArray();
                    $labelsJson = json_encode($labelsArray);
                    $labelsJson = htmlspecialchars($labelsJson, ENT_QUOTES, 'UTF-8');
                    if ($isAdmin) {
                        $btn = '
                            <div class="flex items-center justify-center gap-2">
                            <i style="color: #0b9b01c0;cursor:pointer" class="fa-solid fa-tags fa-xl m-3" data-label="' . $labelsJson . '" data-id="' . $row->id . '" data-modal-trigger="myModal"></i>
                            
                            <a  href="/inv/domain/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Wa"  class="fa-solid fa-file-invoice fa-xl"  ></a>
                            <a  style="color: #171dd4c4;" href="/domain/' . $row->id . '/edit/" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="m-3 editProduct fa-solid fa-lg fa-pen ">
                            </a>
                            
                            <a style="color: #a80404d1;" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="fa-regular fa-trash-can fa-xl deleteProduct">
                            </a>
                        </div>
                        ';
                    } else {
                        $btn = '
                            <div class="flex justify-center items-center gap-4">
                            <a href="/inv/domain/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Wa"  class="fa-solid fa-file-invoice fa-xl"  ></a>';
                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function expired()
    {
        return view('master.domain.expired');
    }
    public function soonExpired()
    {
        return view('master.domain.soon');
    }
}
