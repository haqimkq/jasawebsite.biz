<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Template;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function website()
    {
        $template = Template::all();
        return view('master.layanan.website', compact('template'));
    }

    public function orderWebsite()
    {
        $template = Template::all();
        return view('master.layanan.orderWebsite', compact('template'));
    }
    public function orderWebsiteStore(Request $request)
    {
        $request->validate([
            'nama_domain' => 'required',
            'nama_template' => 'required',
            'nama_paket' => 'required',
            'harga_paket' => 'required',
            'harga_ppn' => 'required',
            'harga_total' => 'required',
        ]);
        $now = Carbon::now()->format('Ymd');
        $random = $now . rand(0, 999);

        // Convert
        $cvTotal = preg_replace("/[^0-9]/", "", $request->harga_total);
        $cvPpn = preg_replace("/[^0-9]/", "", $request->harga_ppn);
        $cvPaket = preg_replace("/[^0-9]/", "", $request->harga_paket);
        $total = intval($cvTotal);
        $ppn = intval($cvPpn);
        $paket = intval($cvPaket);


        $order = new Order();
        $order->number = $random;
        $order->total_price = $total;
        $order->payment_status = 1;
        $order->save();

        $orderPaket = new OrderItem();
        $orderPaket->order_id = $order->id;
        $orderPaket->nama = $request->nama_paket;
        $orderPaket->quantity = 1;
        $orderPaket->price = $paket;
        $orderPaket->save();

        $orderPpn = new OrderItem();
        $orderPpn->order_id = $order->id;
        $orderPpn->nama = 'PPN 11%';
        $orderPpn->quantity = 1;
        $orderPpn->price = $ppn;
        $orderPpn->save();

        $orderDomain = new OrderItem();
        $orderDomain->order_id = $order->id;
        $orderDomain->nama = $request->nama_domain;
        $orderDomain->quantity = 1;
        $orderDomain->price = 0;
        $orderDomain->save();

        $orderTemplate = new OrderItem();
        $orderTemplate->order_id = $order->id;
        $orderTemplate->nama = $request->nama_template;
        $orderTemplate->quantity = 1;
        $orderTemplate->price = 0;
        $orderTemplate->save();

        return redirect()->route('order.show', ['order' => $order->id, 'number' => $order->number]);
    }
}
