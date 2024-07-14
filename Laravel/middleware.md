# Middleware

## Make middleware using following command

```bash
php artisan make:middleware IsAuthTokenAvailable
```

- File Location `app\Http\Middleware\IsAuthTokenAvailable.php`

## Modify middleware that authToken presents in headers or not in handle function

```bash
public function handle(Request $request, Closure $next): Response
{
    if ($request->hasHeader('authToken')) {
        $authToken = $request->header('authToken');
        $request->attributes->add(['authToken' =>  $authToken]);
        return $next($request);
    }

    return response()->json(['type' => 'error', 'code' => 401, 'status' => false, 'message' => 'Unauthorized due to absence of authToken', "redirect" => true, 'toast' => true]);
}
```

## Register middleware in kernel

1. Laravel 11 => file `bootstrap\app.php` for all routes

```bash
->withMiddleware(function (Middleware $middleware) {
    // $middleware->append(IsAuthTokenAvailable::class); // for all routes
})
```

2. In routes\api.php for specific routes

```bash
Route::group(['middleware' => IsAuthTokenAvailable::class], function () {
    Route::get('/auth-4', function () {
        echo "auth 4";
    });
    Route::get('/auth-3', function () {
        echo "auth 3";
    });
});
Route::middleware([IsAuthTokenAvailable::class])->group(function () {
    Route::get('/auth-1', function () {
        $authToken = $request->attributes->get("authToken");
        echo "auth 1 " . $authToken;
        $request->attributes->remove("authToken");
        $authToken = $request->attributes->get("authToken");
        print_r(!$authToken);
    });
    Route::get('/auth-2', function () {
        echo "auth 2";
    });
    Route::get('/free-auth-5', function () {
        echo "free-auth-5";
    })->withoutMiddleware([IsAuthTokenAvailable::class]);
});
Route::get('/auth-6', function () {
    echo "auth 6";
})->middleware(IsAuthTokenAvailable::class);
```

3. In Laravel 10 in kernel file `app\Http\Kernel.php`

```bash
protected $middlewareAliases = [
    'project.auth' => \App\Http\Middleware\IsAuthTokenAvailable::class,
];
```

- project.auth is alies

```bash
  Route::group(['middleware' => ['project.auth']], function () {

  });
```
