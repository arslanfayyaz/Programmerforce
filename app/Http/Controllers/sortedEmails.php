<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class sortedEmails extends Controller
{
    //
 public function calculateTotalHours()
{
    $client = new \GuzzleHttp\Client();

    try {
        $response = $client->get('https://champagne-bandicoot-hem.cyclic.app/api/data');

        $jsonData = $response->getBody()->getContents();

        $decodedResponse = json_decode($jsonData, true);

        if ($decodedResponse['error'] === false) {
            $data = $decodedResponse['data'];

            $users = [];

            foreach ($data as $entry) {
                $email = $entry['email'];
                $totalTime = $entry['total_time'];
                $ip = $entry['ip_address'];

                if (!isset($users[$email])) {
                    $users[$email] = [
                        'total_hours' => 0,
                        'ip' => $ip
                    ];
                }

                if ($totalTime !== null) {
                    $users[$email]['total_hours'] += $this->convertTimeToHours($totalTime);
                }
            }

            return response()->json($users);
        } else {
            return response()->json(['error' => 'API request error'], 500);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

private function convertTimeToHours($time)
{
    if ($time === null) {
        return 0;
    }

    list($hours, $minutes) = explode(':', $time);
    return ($hours + ($minutes / 60));
}
}
