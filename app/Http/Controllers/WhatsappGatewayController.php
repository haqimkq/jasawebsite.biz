<?php

namespace App\Http\Controllers;

use App\Services\Rapiwha\Rapiwha;
use Illuminate\Http\Request;

class WhatsappGatewayController extends Controller
{
    public function index()
    {
        $service = new Rapiwha;
        $data = $service->getMessages();
        $data2 = $service->getCredits();
        $credits = $data2->getData();
        $messages = $data->getData();
        return view('master.whatsappGateway.index', compact('messages', 'credits'));
    }
}
