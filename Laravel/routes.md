# Routes

## API file creation/installation

```bash
php artisan install:api
```

## Direct functionality

1. Routes with blade template

```bash
Route::get('/', function () {
    return view('welcome');
});
```

2. Routes with blade template

```bash
Route::get('/', function () {
    echo "<h1>Welcome to Laravel 11";
});
```

- You can use model and other functionality direct in the route function

3. Routes with group

```bash
Route::group(["prefix" => "home"], function () {
    Route::get("/", function () {
        echo "<h1>This is home route<h1>";
    });
    Route::group(["prefix" => "home-nested"], function () {
        Route::get("/contact", function () {
            echo "<h1>This is home-nested suffix route<h1>";
        });
    });
    Route::get("/about-us", function () {
        echo "<h1>This is home about us route<h1>";
    });
});
```

- http://localhost:5000/home/home-nested/contact/
- http://localhost:5000/home/about-us
- http://localhost:5000/home

4. only blade/view routes

- create file `resources\views\custom\welcome-2.blade.php`

```bash
Route::view('/welcome-2', 'custom.welcome-2', ['name' => 'Taylor']);
```

- welcome-2.blade.php

```bash
<h1>{{ $name }}</h1>
```

5. Routes with parameter

```bash
Route::get('/hello/{name}', function ($name) {
    return 'Hello ' . $name;
});
```

- http://localhost:5000/hello/bhushan

6. Named routes

- Route

```bash
Route::get("/about-us/{name}/{company}", function ($name, $company) {
    echo "<h1>This is home about us route<h1> for " . $name . " of " . $company;
})->name("home-about-us");
```

- View

```bash
<a href="{{ route("home-about-us", ['Bhushan', 'Trinity Soft-tech'])}}">
    <h1>{{ $name }}</h1>
</a>
```

- http://localhost:5000/home/about-us/Bhushan/Trinity%20Soft-tech

7. Additional Route File

- create file `routes\web-2.php`

```bash
?php
Route::get("web-2", function () {
    echo "Web-2 Routes here";
});
```

- in web.php

```bash
require __DIR__ . '/web-2.php'; // Example including the web-2.php file
```

7. Access API routes

- in routes\api.php

```bash
Route::get('api-home', function (Request $request) {
    echo "This is API-HOME route";
});
```

- http://localhost:5000/api/api-home
