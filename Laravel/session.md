# Session

## Set Session

```php
session(['name' => 'bhushan']);
// Using the Session facade
session()->put('email', 'bhushank.bwd@gmail.comn');
session()->flash('message', 'This is a flash message');
```

## Get Session

```php
$name = session('name','default name');
$email = session()->get('email',"default@mail.com");
```

## Destroy Session

```php
session()->forget('name'); // for specific
session()->flush(); // for all
```
