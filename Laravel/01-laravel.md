# Laravel

## Create Project

```bash
composer create-project laravel/laravel demo-laravel-11
```

## Routes

1. API Creation

```bash
php artisan install:api
```

```php
Route::view('/welcome-2', 'custom.welcome-2', ['name' => 'Taylor']);
Route::get('/hello/{name}', function ($name) {
    return 'Hello ' . $name;
})->name("home-name");
<a href="{{ route("home-name", ['Bhushan', 'Trinity Soft-tech'])}}">
    <h1>{{ $name }}</h1>
</a>
require __DIR__ . '/web-2.php';// additional route file

// in routes\api.php
Route::get('api-home', function (Request $request) {
    echo "This is API-HOME route";
});
return redirect("session/view");
Route::controller(YourController::class)->group(function () {
    Route::get('route-1', 'method1')->name('your-controller-method-route-1');
});
Route::group(["prefix" => "home"], function () {});
Route::group(['middleware' => IsAuthTokenAvailable::class], function () {});
Route::get("/countries", [PublicController::class, 'getCountries']);
Route::resource('address', AddressController::class);

```

## accessor

1. in model `app\Models\User.php`

```php
use Illuminate\Database\Eloquent\Casts\Attribute;
protected function name(): Attribute
{
    return Attribute::make(
        get: fn(string $value) => ucfirst($value),
        set: fn(string $value) => strtolower($value),
    );
}
```

## Migrations

```php
$table->foreign("role_id")->references("id")->on("roles");
```

## blade

```php
<title>@stack('title', 'Student Management')</title>
@include('layouts/header')
<div class="container">@yield('main-section')</div>
@include('layouts/footer')

// usage
@extends('layouts.bs5')
@push('title')
    BS5 Layout example
@endpush

@section('main-section')
    <h2>This is main section</h2>
@endsection

$countries = ['India', "USA", "England"];
$data = compact("countries");
return view('add-country', $data);
{!! $html_text !!}

<form action="" method="POST">
    @csrf
    <input type="text" name="country" />
    <button type="submit">Save</button>
</form>
{{-- @@if() this @ is escape character --}}
```

## Built in helper

```php
// assets
echo asset("assets/sample.txt");
// output => http://localhost:5000/assets/sample.txt

echo url("session/view");
// output => http://localhost:5000/session/view

$random = Str::random(40);
echo $random;
// output => SAiBGR0Hv3WQd19jAXyHexIm67O2P4qVOfCbo2m6

$path = public_path();
echo $path;
// output => C:\xampp\htdocs\demo-laravel-11\public

$route = route('home-about-us', ['bhushan','infosys']);
echo $route;
// output => http://localhost:5000/home/about-us/bhushan/infosys

abort(403);
// Gives `403 error`
```

## Controller

```bash
php artisan make:controller AddressController --resource
```

## validation

```php
$request->validate([
    "name" => "required|min:3|max:255",
    "email" => "required|email|max:255",
    "gender" => ["required", Rule::in(['male,female'])],
], [
    'name.min' => "Name should be minimum :min characters" // if not custom message here then default message will shown
]);
return $request;

// view
<form action="submit-form" method="POST">
@csrf
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif
    <input type="text" class="form-control {{ $errors->first("name") ? "text-danger" :"" }}" id="name" name="name" value="{{ old('name') }}">
    @error("name")
    <div id="nameHelp">{{$message}}</div>
    @enderror
    <button type="submit" class="btn">Submit</button>
</form>

```

## ivjs

```php
@php
$user_roles = ['normal', 'admin', 'front desk'];
$users = ['bhushan', 'sourabh', 'abhishek'];
@endphp
<script>
    let user_roles = @json($user_roles);
    let users = {{ Js::from($users) }};
    console.log(user_roles, users)
</script>
```

## Other

```bash
php artisan make:model Wallet/ExternalWallet -m --resource
php artisan make:model Wallet/ExternalWallet -mc
```
