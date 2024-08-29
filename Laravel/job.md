# Job

## Setup

1. Make Job

```bash
php artisan make:job WelcomeUser
php artisan make:job Sleep
```

2. Make migration but in Laravel 11 Migration exists already

```bash
php artisan queue:table
php artisan migrate
```

3. QUEUE_CONNECTION=database

## Implementation

1. In Job `app\Jobs\Sleep.php`

- variable

```php
public $tries = 2;  // it tries to 2 times job
```

- handle method

```php
sleep(20);
info("Sleep Done");
```

2. Call Job

```php
Sleep::dispatch()->delay(5);
echo "Welcome to Laravel Job";
```

## Failed Job Example

- In Handle method

```php
throw new \Exception("Failed");
```

- Create Failed method

```php
public function failed(\Throwable $e)
{
    info($e->getMessage());
}
```
