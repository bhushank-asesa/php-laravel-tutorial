# Blade template or View

## create view

```bash
php artisan make:view add-country
```

## in controller

```php
$countries = ['India', "USA", "England"];
$data = compact("countries");
return view('add-country', $data);
```

## in routes

```php
Route::view('/welcome-2', 'custom.welcome-2', ['name' => 'Taylor']);
```

## Blade template

```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Countries list</h1>
    @foreach ($countries as $country)
        <li>{{ $country }}</li>
    @endforeach
    <form action="" method="POST">
        @csrf
        <input type="text" name="country" />
        <button type="submit">Save</button>
    </form>
    {{-- @@if() this @ is escape character --}}
</body>

</html>

```
