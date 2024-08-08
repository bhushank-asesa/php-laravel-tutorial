# IV JS

## In file `resources\views\iv-js.blade.php`

```php
@extends('layouts.bs5')
@section('main-section')
    @php
        $user_roles = ['normal', 'admin', 'front desk'];
        $users = ['bhushan', 'sourabh', 'abhishek'];
    @endphp
    <h1 class="header">This IV JS example</h1>
@endsection
@section('main-section')
    <small>This section will not render as main-section used above</small>
@endsection
@push('script')
    <script>
        let user_roles = @json($user_roles);
        let users = {{ Js::from($users) }};
        console.log(user_roles, users)
    </script>
@endpush
@push('style')
    <style>
        .header {
            color: red;
        }
    </style>
@endpush
```

- Use always stack to style and script

## In Layout `resources\views\layouts\bs5.blade.php`

```php
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <title>@stack('title', 'Laravel blade layout')</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @stack('style')
</head>

<body>
    @include('layouts/header')
    <div class="container">
        @yield('main-section')
    </div>

    @include('layouts/footer')
</body>
@stack('script')

</html>

```
