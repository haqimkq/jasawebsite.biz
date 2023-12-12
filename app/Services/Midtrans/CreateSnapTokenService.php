<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getSnapToken($items)
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->order->number,
                'gross_amount' => $this->order->total_price,
            ],
            'item_details' => $items,
            'customer_details' => [
                'first_name' => 'Nama',
                'email' => 'muhamadduki@gmail.com',
                'phone' => '081234567890',
            ]
        ];
        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
