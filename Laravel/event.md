# Event and Event Listener

## Creation

- Create Event and Event Listener

```bash
php artisan make:event UserCreated
php artisan make:listener UserCreatedListener --event=UserCreated

```

## Code

1. Edit UserCreated Event `app\Events\UserCreated.php`

```php
public $user;
public function __construct($user)
{
    $this->user = $user;
}
```

2. In Listener `app\Listeners\UserCreatedListener.php` handle method

```php
$today = Carbon::today()->format('Y-m-d');
// Find or create a DayWiseUserCreation record
$dayWiseUserCreation = UserCount::firstOrCreate([
    'register_date' => $today,
]);
// Increment the counter
$dayWiseUserCreation->increment('count');
$dayWiseUserCreation->save();
```

3. Register Event in `app\Providers\AppServiceProvider.php` Method => boot

```php
Event::listen(
    UserCreatedListener::class,
);
```

4. Call Event

```php
event(new UserCreated($jobUser));
```
