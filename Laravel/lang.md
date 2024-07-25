# Multiple Language

## Installation

1. run following command

```bash
php artisan lang:publish
```

2. Add files like `lang\hi\welcome.php`, `lang\mr\welcome.php` etc. and add following code w.r.t. language

- :name is dynamic variable

```bash
<?php
return [
    'welcome' => 'आपले स्वागत आहे :name',
];
```

3. Create Middleware

```bash
public function handle(Request $request, Closure $next): Response
{
    if ($request->session()->get("lang"))
        \App::setLocale($request->session()->get("lang"));
    return $next($request);
}
```

4. Usage

- view

```bash
<a href="/setting/en">English</a><br/>
<a href="/setting/mr">Marathi</a><br/>
<a href="/setting/hi">Hindi</a><br/>
<a href="/default/en">Default</a><br/>
{{ __('welcome.welcome',['name'=>"Bhushan"]) }}
```

5. routes

```bash
Route::middleware("SetLang")->group(function () {
    Route::view("home/welcome", 'home.welcome');
    Route::get("setting/{lang}", function ($lang) {
        Session::put("lang", $lang);
        return redirect("home/welcome");
    });
});
Route::get("default/{lang}", function ($lang) {
    App::setLocale($lang);
    return redirect("home/welcome2");
});
Route::view("home/welcome2", 'home.welcome');
```

6. in `bootstrap\app.php`

```bash
->withMiddleware(function (Middleware $middleware) {
    $middleware->appendToGroup("SetLang", SetLang::class);
})
```

7. in .env change default language

```bash
APP_LOCALE=mr
```
