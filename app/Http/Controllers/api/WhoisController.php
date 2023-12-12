<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Iodev\Whois\Factory;
use Iodev\Whois\Whois;

class WhoisController extends Controller
{
    public function lookup(Request $request)
    {
        $domain = $request->input('domain');
        $whois = Factory::get()->createWhois();
        $status = $whois->isDomainAvailable($domain);
        $result = ["status" => $status ? 1 : 0];
        return response()->json($result);
    }
}
