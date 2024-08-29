# Built in helpers

## assets

```php
echo asset("assets/sample.txt");
```

- http://localhost:5000/assets/sample.txt

## url

```php
echo url("session/view");
```

- http://localhost:5000/session/view

## str

```php
$random = Str::random(40);
echo $random;
```

- SAiBGR0Hv3WQd19jAXyHexIm67O2P4qVOfCbo2m6

## path

```php
$path = public_path();
echo $path;
```

- C:\xampp\htdocs\demo-laravel-11\public

## route

```php
$route = route('home-about-us', ['bhushan','infosys']);
echo $route;
```

- http://localhost:5000/home/about-us/bhushan/infosys

## abort

```php
abort(403);
```

- Gives `403 error`
