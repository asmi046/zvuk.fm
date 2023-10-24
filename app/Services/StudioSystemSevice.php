<?php
namespace App\Services;

class StudioSystemSevice {

    protected function do_query($url, $method, $payload = []) {

        $accessToken = config('studio.studio_token');

        if (empty($accessToken)) return [];

        $payload_json = json_encode ($payload, JSON_UNESCAPED_UNICODE);

        $header_line = [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload_json)
        ];

        $header_line[] = "Authorization: Bearer 1|".$accessToken;

        $ch = curl_init(config('studio.studio_url').$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload_json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header_line );

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode ($result);

    }


    public function get_schedule($dey="today") {
        $schedule = $this->do_query('schedule/'.$dey, "GET");
        return $schedule;
    }

}
