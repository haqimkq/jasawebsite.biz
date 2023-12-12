<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::first();
        return view('master.order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Order $order)
    {
        $server = config('midtrans');
        $snapToken = $order->snap_token;
        $orderItems = OrderItem::where('order_id', $order->id)->get();
        $items = $orderItems->toArray();
        $transformedArray = array_map(function ($item) {
            return [
                'id' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'name' => $item['nama'],
            ];
        }, $items);
        if (empty($snapToken)) {
            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken($transformedArray);

            $order->snap_token = $snapToken;
            $order->save();
        }

        return view('master.order.show', compact('order', 'snapToken'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
