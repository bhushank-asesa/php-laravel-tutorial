# Accessor and Mutator

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

2. Usage

```php
$user = User::create(['name' => $name, "email" => Str::random(7) . "@" . Str::random(7) . ".com", "password" => Str::random(5)]);
    print_r($user->toArray());
```

## Create virtual column

1. in `app\Models\Public\PrimaryUser.php`

```php
 public function age()
{
    return Carbon::parse($this->attributes['birthdate'])->age;
}
```

2. Usage

```php
$user = PrimaryUser::findOrFail($user_id);
print_r($user->age());
return response()->json($user);
```
