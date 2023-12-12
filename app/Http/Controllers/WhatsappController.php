<?php

namespace App\Http\Controllers;

use Aloha\Twilio\Twilio;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class WhatsappController extends Controller
{
    public function sendWhatsapp($no_hp, $messages)
    {
        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio = new Client($sid, $token);
        $message = $twilio->messages
            ->create(
                "whatsapp:+" . $no_hp,
                [
                    "from" => "whatsapp:+14155238886",
                    "body" => $messages
                ]
            );

        return 'Pesan WhatsApp berhasil dikirim.';
    }
}
