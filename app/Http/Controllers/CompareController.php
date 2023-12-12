<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CompareController extends Controller
{
    public function index()
    {
        return view('compare.upload');
    }
    public function upload(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx',
        ]);

        $excelFile = $request->file('excel_file');

        $data = Excel::toArray([], $excelFile);

        $excelDomains = array_column($data[0], '0');
        $databaseDomains = Domain::pluck('nama_domain')->toArray();

        $results = [];

        foreach ($excelDomains as $excelDomain) {
            if (in_array($excelDomain, $databaseDomains)) {
                $results[] = 1;
            } else {
                $results[] = 0;
            }
        }
        // dd($results);
        return view('compare.result', compact('results', 'excelDomains'));
    }
    public function filterPost(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx',
        ]);

        $excelFile = $request->file('excel_file');
        $data = Excel::toArray([], $excelFile);
        $excelDomains = array_column($data[0], '0');
        $excelDomains = array_filter($excelDomains);
        $domains = [];
        $tldCount = [];
        foreach ($excelDomains as $address) {
            $parts = explode('.', $address);
            $nama_domain = $parts[0];
            $tld = implode('.', array_slice($parts, 1));
            $domains[] = ['domain' => $nama_domain, 'tld' => $tld];

            if (!isset($result[$tld])) {
                $result[$tld] = [];
            }
            $result[$tld][] = $nama_domain;
        }
        // dd($result);
        return view('compare.filterResult', compact('result'));
    }
    public function filter()
    {
        return view('compare.filter');
    }
    public function check()
    {
        return view('compare.check');
    }
    public function checkPost(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx',
        ]);
        $excelFile = $request->file('excel_file');
        $data = Excel::toArray([], $excelFile);
        $excelDomains = array_column($data[0], '0');
        $excelDomains = array_filter($excelDomains);
        $domains = [];
        return view('compare.checkResult', compact('excelDomains'));
    }
    public function checkGet($domain)
    {
        $client = new Client();

        try {
            $response = $client->get($domain);
            $statusCode = $response->getStatusCode();
            set_time_limit(0);
            if ($statusCode == 200) {
                $status = 'Aktif';
            } else {
                $status = 'Tidak Aktif';
            }
        } catch (\Exception $e) {
            $status = 'Tidak Aktif (Error)';
        }

        return response()->json(['domain' => $domain, 'status' => $status]);
    }
}
