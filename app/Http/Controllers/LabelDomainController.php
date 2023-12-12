<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\LabelDomain;
use App\Models\PivotLabelDomain;
use App\Models\subLabelDomain;
use Illuminate\Http\Request;

class LabelDomainController extends Controller
{

    public function index()
    {

        $domain = Domain::all();
        $subLabel = subLabelDomain::all();
        $label = LabelDomain::with('domain')->get();
        // dd($label[1]->domain[1]->pivot);
        return view('master.labeldomain.index', compact('label', 'domain', 'subLabel'));
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

        $label = new LabelDomain();
        $label->name = $request->name;
        $label->color = $request->color;
        $label->save();

        return redirect()->back()->with(['success' => 'Label Berhasil Ditambahkan']);
    }
    public function update(Request $request, LabelDomain $labelDomain)
    {
        $request->validate(
            [
                'name' => 'required',
                'color' => 'required',
            ]
        );
        // dd($labelDomain);
        $labelDomain->fill($request->post())->save();

        return redirect()->route('labelDomain.index')->with(['success' => 'Label berhasil di update']);
    }
    public function edit(LabelDomain $labelDomain)
    {
        return view('master.labeldomain.edit', compact('labelDomain'));
    }
    public function storeEdit(Domain $domain, Request $request)
    {

        $label = LabelDomain::all();
        // dd($request);
        return view('master.labeldomain.editlabel', compact('domain', 'label'));
    }
    public function labelDomain(Request $request, LabelDomain $label)
    {
        $domains = $request->input('domains', []);

        if ($request->sublabels) {
            $subLabel = $request->input('sublabels', []);
            $syncData = [];

            foreach ($domains as $domainId) {
                foreach ($subLabel as $subLabelId) {
                    $syncData[$domainId] = ['sub_label_domain_id' => $subLabelId];
                }
            }
            $label->domain()->syncWithoutDetaching($syncData);
            $label->domain()->syncWithoutDetaching($domains);
        } else {
            $label->domain()->syncWithoutDetaching($domains);
        }

        return redirect()->route('labelDomain.index')->with('success', 'Berhasil Menyimpan Perubahan.');
    }

    public function storeLabel(Request $request, Domain $domain)
    {
        $labels = $request->input('labels', []);
        $domain->label()->sync($labels);
        return redirect()->route('domain.index')->with('success', 'Berhasil Menyimpan Perubahan.');
    }
    public function destroy($id)
    {
        $label = LabelDomain::findOrFail($id);
        $label->delete();
        return redirect()->back()->with('success', 'Label Berhasil Dihapus.');
    }
    public function show(labelDomain $labelDomain)
    {
        // dd($labelDomain->domain);
        return view('master.labeldomain.show', compact('labelDomain'));
    }
    public function domainDelete(Domain $domain, LabelDomain $label)
    {
        $label->domain()->detach($domain);
        return redirect()->route('labelDomain.show', ['labelDomain' => $label->id])->with('success', 'Domain telah dihapus dari label domain');
    }

    public function editKeterangan(Request $request, $domain, $label)
    {
        $label = PivotLabelDomain::where('domain_id', $domain)->where('label_domain_id', $label)->first();
        $label->keterangan = $request->keterangan;
        $label->save();

        if ($label) {
            $label->keterangan = $request->keterangan;
            $label->save();
            return response()->json(['message' => 'Keterangan telah diperbarui'], 200);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
    }
    public function urgent()
    {
        $label = LabelDomain::where('name', 'Urgent')->first();
        return redirect()->route('labelDomain.show', $label->id);
    }
}
