# API call using cURL function

## Common PHP functions

```bash
function makeCURLCall($url, $method = 'GET', $data = [], $authToken = null, $bearerToken = null, $decode = true)
{
    try {

        $ch = curl_init($url);
        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        } else {
            For GET requests, append query parameters to the URL
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
```

## Usage

- Get Call

```bash
$url = "http://ipecho.net/plain";
$IP = makeCURLCall($url, "GET", [], null, null, false);
echo $IP;
```

- Get Call with parameter

```bash
$url = "http://localhost:5000/api/v1/public/states";
$states = makeCURLCall($url, "GET", array("country_id" => "101"));
print_r($states);
```

- Post Call

```bash
$url = "http://localhost:5000/auth/login";
$data['username'] = "username";
$data['password'] = "password";
$loginResponse = makeCURLCall($url, "POST", $data);
print_r($loginResponse);
```
