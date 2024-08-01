<?php
function makeCURLCall($url, $method = 'GET', $data = [], $authToken = null, $bearerToken = null, $decode = true)
{
    try {

        $ch = curl_init($url);
        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        } else {
            // For GET requests, append query parameters to the URL
            $url .= '?' . http_build_query($data);
            $ch = curl_init($url);
        }
        $headers = [];
        if ($bearerToken) {
            $headers[] = 'Authorization: Bearer ' . $bearerToken;
        }
        if ($authToken) {
            $headers[] = 'authToken: ' . $authToken;
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }

        curl_close($ch);

        if ($decode) {
            return json_decode($response, true);
        } else {
            return $response;
        }
    } catch (\Exception $e) {
        return ['status' => false, 'message' => $e->getMessage()];
    }
}
// $url = "http://ipecho.net/plain";
// $IP = makeCURLCall($url, "GET", [], null, null, false);
// echo $IP;

// $url = "http://localhost:5000/api/v1/public/states";
// $states = makeCURLCall($url, "GET", array("country_id" => "101"));
// print_r($states);

// $url = "http://localhost:5000/api/v1/auth/login";
// $data['username'] = "sayope";
// $data['password'] = "Silo@1234";
// $loginResponse = makeCURLCall($url, "POST", $data);
// print_r($loginResponse);

