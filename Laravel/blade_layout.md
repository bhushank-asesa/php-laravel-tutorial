# Blade layout

## Main Layout `resources\views\layouts\bs5.blade.php`

```php
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"
      rel="stylesheet"
    />

    <title>@stack('title', 'Student Management')</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </head>
  <body>
    @include('layouts/header')
    <div class="container">@yield('main-section')</div>

    @include('layouts/footer')
  </body>
  @yield('script')
</html>
```

## View `resources\views\bs-example.blade.php`

```php
@extends('layouts.bs5')
@push('title')
    BS5 Layout example
@endpush

@section('main-section')
    <h2>This is main section</h2>
@endsection
@section('script')
    <script>
        console.log("blade script loaded")
    </script>
@endsection
```

## Usage

```php
Route::view('/bs-5', 'bs-example');
```
