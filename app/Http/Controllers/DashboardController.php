<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\LabelDomain;
use App\Models\Pelanggan;
use App\Models\Todo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function quotes()
    {
        $newQuote = Inspiring::quote();

        return response()->json($newQuote);
    }
    public function searchDomain(Request $request)
    {
        $results = Domain::search($request->keyword)->get();
        return view('search-results', compact('results'));
    }
    public function index(User $user, Pelanggan $pelanggan, Request $request)
    {
        $domain = Domain::where('externalDomain', false)->get();
        $quotes = Inspiring::quote();
        $onlyHosting = Domain::where('onlyHosting', true)->get();
        $onlyHostingCount = $onlyHosting->count();
        $userTodo = User::where('isAdmin', false)->where('isSupport', true)->where('isShowPoint', true)->get();
        $dataPoint = [];
        foreach ($userTodo as $userTodos) {
            $totalPoints = $userTodos->todos()
                ->where('status', 'deleted')
                ->whereMonth('doneAt', '=', date('m', strtotime(Carbon::now()->format('Y-m'))))
                ->whereYear('doneAt', '=', date('Y', strtotime(Carbon::now()->format('Y-m'))))
                ->sum('point');

            $dataPoint[] = [
                'user' => $userTodos,
                'totalPoints' => $totalPoints,
                'point' => $userTodos->todos()
                    ->where('status', 'deleted')
                    ->whereMonth('doneAt', '=', date('m', strtotime(Carbon::now()->format('Y-m'))))
                    ->whereYear('doneAt', '=', date('Y', strtotime(Carbon::now()->format('Y-m'))))
                    ->get()
            ];
        }
        if (Auth::user()->isAdmin == true) {
            $todo = Todo::where('status', '!=', 'deleted')->orderBy('created_at', 'desc')->get();
        } else {
            $authUserId = Auth::id();
            $todo = Todo::whereHas('users', function ($subquery) use ($authUserId) {
                $subquery->where('user_id', $authUserId);
            })->where('status', '!=', 'deleted')->orderBy('created_at', 'desc')->get();
            // dd($todo);
        }
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
        $labelUrgent = LabelDomain::where('name', 'Urgent')->with('domain')->first();
        if (isset($labelUrgent)) {
            if ($labelUrgent->domain->count() > 0) {
                // dd($labelUrgent);
                $labelUrgentCount = $labelUrgent->domain->count();
            } else {
                $labelUrgentCount = 0;
            }
        } else {
            $labelUrgentCount = 0;
        }
        $limit = $request->input('limit', 10);
        $mostPelanggan = Pelanggan::withCount('domain')
            ->orderByDesc('domain_count')
            ->take($limit)
            ->get();
        $td = Carbon::now();
        $today = Carbon::now();
        $domains = Domain::where('externalDomain', false)->get();
        $pelanggans = Pelanggan::all();
        $count = 0;
        $expiryThreshold = $today->addDays(60);
        $totalDomain = Domain::where('externalDomain', false)->count();
        $totalDomainJson = json_encode(Domain::where('externalDomain', false)->count());
        $totalUser = $user::count() - 1;
        $totalPelanggan = $pelanggan::count();
        $totalMostPelanggan = $pelanggan::take(10)->get();
        $todays = Carbon::today();
        $activeCounts = 0;
        foreach ($domains as $item) {
            $cvExpired = Carbon::parse($item->tanggal_expired);
            if ($todays < $cvExpired) {
                $activeCounts++;
            }
        };
        $activeCountsJson = json_encode($activeCounts);

        $countSoonExpired = 0;
        foreach ($domains as $domain) {
            if ($domain->tanggal_expired < $expiryThreshold && $domain->tanggal_expired > $todays) {
                $countSoonExpired++;
            }
        }
        $countSoonExpiredJson = json_encode($countSoonExpired);

        $expiredCount = 0;
        foreach ($domains as $item) {
            $cvExpireds = Carbon::parse($item->tanggal_expired);
            if ($cvExpireds < $todays) {
                $expiredCount++;
            }
        }
        $expiredCountJson = json_encode($expiredCount);
        $expiredToday = 0;
        $results = null;
        if ($request->has('keyword')) {
            $results = Domain::search($request->keyword)->get();
        }
        $labels = LabelDomain::withCount('domain')->whereHas('domain')->get();
        $labelsArray = $labels->pluck('name');
        $labelsColorArray = $labels->pluck('color');
        $labelsArrayId = $labels->pluck('id');
        $domainsCountArray = $labels->pluck('domain_count');
        $labelsJson = $labelsArray->toJson();
        $labelsIdJson = $labelsArrayId->toJson();
        $domainsJson = $domainsCountArray->toJson();
        $labelColorsJson = $labelsColorArray->toJson();

        $pelangganNotActive = Pelanggan::doesntHave('domain')->get();
        $pelangganActive = Pelanggan::whereHas('domain')->get();
        $pelangganNotActiveCount = $pelangganNotActive->count();
        $pelangganActiveCount = $pelangganActive->count();

        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $barExpired = [];
        $barActive = [];
        $barNew = [];
        $year = [];
        $yearsExpired = Domain::selectRaw('YEAR(tanggal_expired) as year')
            ->distinct()
            ->pluck('year');

        $yearsCreatedAt = Domain::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->pluck('year');
        $year = $yearsExpired->concat($yearsCreatedAt)->unique()->sort();
        foreach ($months as $month) {
            $startOfMonth = date('Y-m-01', strtotime("1 $month"));
            $endOfMonth = date('Y-m-t', strtotime("1 $month"));
            $barExpired[] = Domain::where('tanggal_expired', '>=', $startOfMonth)
                ->where('tanggal_expired', '<=', $endOfMonth)
                ->count();

            $barActive[] = Domain::where('tanggal_expired', '>=',  date('Y-m-d', strtotime($month)))
                ->whereYear('tanggal_expired', '>=', date('Y'))
                ->count();
            $dm[] = date('Y-m-d', strtotime($month));

            $barNew[] = Domain::where(function ($query) use ($startOfMonth, $endOfMonth) {
                $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m-%d') >= ?", [$startOfMonth])
                    ->whereRaw("DATE_FORMAT(created_at, '%Y-%m-%d') <= ?", [$endOfMonth]);
            })->count();
        }
        return view('dashboard', compact(
            'totalDomain',
            'totalUser',
            'totalPelanggan',
            'domains',
            'expiryThreshold',
            'count',
            'td',
            'mostPelanggan',
            'totalMostPelanggan',
            'todays',
            'activeCounts',
            'countSoonExpired',
            'expiredCount',
            'expiredToday',
            'activeCountsJson',
            'countSoonExpiredJson',
            'expiredCountJson',
            'totalDomainJson',
            'results',
            'pelanggans',
            'labelsJson',
            'domainsJson',
            'labelsIdJson',
            'pelangganNotActiveCount',
            'pelangganNotActive',
            'pelangganActiveCount',
            'pelangganActive',
            'months',
            'barExpired',
            'barActive',
            'barNew',
            'year',
            'labelColorsJson',
            'labelUrgentCount',
            'vendorDomain',
            'todo',
            'onlyHostingCount',
            'quotes',
            'dataPoint'
        ));
    }


    public function barChart(Request $request)
    {
        $years = $request->input('year', date('Y'));
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $barExpired = [];
        $barActive = [];
        $barNew = [];

        foreach ($months as $month) {
            $startOfMonth = date('Y-m-01', strtotime("1 $month $years"));
            $endOfMonth = date('Y-m-t', strtotime("1 $month $years"));
            $barExpired[] = Domain::where('tanggal_expired', '>=', $startOfMonth)
                ->where('tanggal_expired', '<=', $endOfMonth)
                ->whereYear('tanggal_expired', '=', $years)
                ->count();

            $barActive[] = Domain::where('tanggal_expired', '>=',  $startOfMonth)
                ->count();

            $barNew[] = Domain::where(function ($query) use ($startOfMonth, $endOfMonth) {
                $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m-%d') >= ?", [$startOfMonth])
                    ->whereRaw("DATE_FORMAT(created_at, '%Y-%m-%d') <= ?", [$endOfMonth]);
            })->count();
        }
        $data = [
            'months' => $months,
            'barExpired' => $barExpired,
            'barActive' => $barActive,
            'barNew' => $barNew,
        ];
        return response()->json($data);
    }
    public function mostPelanggan(Request $request)
    {
        $limit = $request->input('limit', 10);
        $mostPelanggan = Pelanggan::withCount('domain')
            ->orderByDesc('domain_count')
            ->take($limit)
            ->get();
        return view('master.dashboard.mostpelanggan', compact('mostPelanggan'));
    }
}
