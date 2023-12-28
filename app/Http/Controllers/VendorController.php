<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function show($id, Request $request)
    {
        $vendorDomains = Domain::select('vendor', 'nama_domain')
            ->whereNotNull('vendor')
            ->get()
            ->groupBy('vendor');
        $vendorDomain = [];
        $idVendor = 1;

        foreach ($vendorDomains as $vendor => $domains) {
            $domainsForVendor = [];
            foreach ($domains as $domain) {
                $domainsForVendor[] = $domain->nama_domain;
            }
            $vendorDomain[] = (object) [
                'id' => $idVendor,
                'vendor' => $vendor,
                'domain' => $domainsForVendor
            ];
            $idVendor++;
        }
        return view('master.vendor.show', compact('id', 'vendorDomain'));
    }
}
