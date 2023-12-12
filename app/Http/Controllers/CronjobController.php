<?php

namespace App\Http\Controllers;

use App\Models\Cronjob;
use App\Models\Domain;
use App\Models\LabelDomain;
use App\Models\subLabelDomain;
use App\Models\Todo;
use App\Models\User;
use App\Services\Woowa\Woowa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CronjobController extends Controller
{
    public function index(Request $request)
    {

        $data = Cronjob::with('domains', 'users')->get();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                            <div class="flex items-center justify-center gap-2">
                            <a  style="color: #171dd4c4;" href="/cronjob/' . $row->id . '/edit/" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="m-3 editProduct fa-solid fa-lg fa-pen ">
                            </a>
                            <a style="color: #a80404d1;" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="fa-regular fa-trash-can fa-xl deleteProduct">
                            </a>
                        </div>
                        ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('master.cronjob.index');
    }
    public function create()
    {
        $domain = Domain::all();
        $label = LabelDomain::all();
        $sublabel = subLabelDomain::all();
        $user = User::where('isSupport', 1)
            ->where('isAdmin', 0)
            ->get();
        return view('master.cronjob.create', compact('domain', 'user', 'label', 'sublabel'));
    }
    public function edit(Cronjob $cronjob)
    {
        $domain = Domain::all();
        $label = LabelDomain::all();
        $sublabel = subLabelDomain::all();
        $user = User::where('isSupport', 1)
            ->where('isAdmin', 0)
            ->get();
        return view('master.cronjob.edit', compact('domain', 'user', 'label', 'sublabel', 'cronjob'));
    }
    public function store(Request $request)
    {
        $nama_domain = [];
        $domains = $request->input('domain', []);
        if ($request->has('domain')) {
            foreach ($domains as $domainId) {
                $nama_domain = Domain::findOrFail($domainId);
                $domainName[] = $nama_domain->nama_domain;
                $todo = new Cronjob();
                $todo->subject = $request->subject;
                $todo->catatan = $request->catatan;
                $todo->date = $request->date;
                $todo->time = $request->time;
                $todo->save();
                $todo->domains()->attach($domainId);
                $todo->users()->attach($request->user);
            }
        } else {
            $todo = new Cronjob();
            $todo->subject = $request->subject;
            $todo->catatan = $request->catatan;
            $todo->date = $request->date;
            $todo->time = $request->time;
            $todo->save();
            $todo->users()->attach($request->user);
        }
        return redirect()->route('cronjob.index')->with(['success' => 'Cronjob berhasil ditambahkan']);
    }
    public function destroy($id)
    {
        Cronjob::find($id)->delete();
        return response()->json(['success' => 'Cronjob deleted successfully.']);
    }
    public function update(Cronjob $cronjob, Request $request)
    {
        if ($request->domain === null) {
            $request->request->remove('domain');
        }
        if ($request->has('domain')) {
            $domains = $request->input('domain');
            $domain = Domain::findOrFail($domains);
            $cronjob->domains()->sync($domain);
        }
        $cronjob->subject = $request->subject;
        $cronjob->catatan = $request->catatan;
        $cronjob->date = $request->date;
        $cronjob->time = $request->time;
        $cronjob->save();
        $cronjob->users()->sync($request->user);
        return redirect()->route('cronjob.index')->with(['success' => 'Cronjob berhasil Diedit']);
    }
}
