<?php

namespace App\Services\Whatsapp;

use Twilio\Rest\Client;

class Whatsapp
{
    public function sendWhatsapp($no_hp, $messages)
    {
        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio = new Client($sid, $token);
        try {
            $message = $twilio->messages
                ->create(
                    "whatsapp:+" . $no_hp,
                    [
                        "from" => "whatsapp:+14155238886",
                        "body" => $messages
                    ]
                );

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
