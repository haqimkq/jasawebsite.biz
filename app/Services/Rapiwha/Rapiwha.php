<?php

namespace App\Services\Rapiwha;

use GuzzleHttp\Client;

class Rapiwha
{
    public function sendWhatsapp($no_hp, $messages)
    {
        $client = new Client();
        $apiKey = env('RAPIWHA_API_KEY');

        try {
            $client->request('GET', 'https://panel.rapiwha.com/send_message.php?apikey=' . $apiKey . '&number=' . $no_hp . '&text=' . $messages);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function getMessages()
    {
        $client = new Client();
        $apiKey = env('RAPIWHA_API_KEY');

        try {
            $response = $client->request('GET', 'https://panel.rapiwha.com/get_messages.php?apikey=' . $apiKey);
            $body = $response->getBody()->getContents();

            $data = json_decode($body, true);
            $groupedMessages = [];

            foreach ($data as $message) {
                $to = $message['to'];
                $from = $message['from'];

                // Gabungkan pesan ke dalam grup berdasarkan nomor
                if (!isset($groupedMessages[$to])) {
                    $groupedMessages[$to] = [];
                }
                $groupedMessages[$to][] = $message;

                if (!isset($groupedMessages[$from])) {
                    $groupedMessages[$from] = [];
                }
                $groupedMessages[$from][] = $message;
            }

            $phoneNumbers = array_keys($groupedMessages);
            $array = [];
            foreach ($phoneNumbers as $phoneNumber) {
                $array[] = [
                    'number' => $phoneNumber,
                    'messages' => $groupedMessages[$phoneNumber]
                ];
            }
            // dd($array);
            return response()->json($array);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengambil pesan'], 500);
        }

        return response()->json($response);
    }
    public function getCredits()
    {
        $client = new Client();
        $apiKey = env('RAPIWHA_API_KEY');
        try {
            $response = $client->request('GET', 'https://panel.rapiwha.com/get_credit.php?apikey=' . $apiKey);
            $body = $response->getBody()->getContents();

            $data = json_decode($body, true);

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengambil pesan'], 500);
        }
    }
}
