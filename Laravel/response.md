# Response

## Make resource

```bash
php artisan make:resource GeneralResponse
```

## use resource

- in api routes

```php
use App\Http\Resources\GeneralResponse;
Route::get('response', function (Request $request) {
    $response = ['type' => 'error', 'code' => 500, 'status' => false, 'message' => 'Sample error response', 'toast' => true];
    return new GeneralResponse($response);
});
```

## Response from request in thunderclient/postman/hoppscotch

```json
{
  "type": "error",
  "status": false,
  "code": 500,
  "message": "Sample error response",
  "data": {},
  "toast": true
}
```

## make log

```php
use Illuminate\Support\Facades\Log;

Route::get('log', function (Request $request) {
    try {
        $a = 5 / 0;
    } catch (\DivisionByZeroError $e) {
        Log::info('log Error : ' . $e->getMessage() . " @" . $e->getLine() . "  \in " . $e->getFile());
    }
});
```

- in storage\logs\laravel.log

```php
[2024-07-14 06:47:51] local.INFO: log Error : Division by zero @26 in C:\xampp\htdocs\demo-laravel-11\routes\api.php
```
