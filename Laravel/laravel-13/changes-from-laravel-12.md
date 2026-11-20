# Laravel 13 (from Laravel 12)

Released 17 March 2026. Source: https://laravel.com/docs/13.x/releases and https://laravel.com/docs/13.x/upgrade

| | Laravel 12 | Laravel 13 |
| --- | --- | --- |
| PHP | 8.2 - 8.5 | 8.3 - 8.5 |
| Released | 24 February 2025 | 17 March 2026 |
| Bug fixes until | 13 August 2026 | Q3 2027 |
| Security fixes until | 24 February 2027 | 17 March 2028 |

Most apps can upgrade without much application code. The high-impact items are the dependency bumps and the CSRF middleware rename.

## Requirements

1. PHP 8.3 minimum. Laravel 12 still allowed PHP 8.2.

2. In `composer.json`

```json
"laravel/framework": "^13.0",
"laravel/boost": "^2.0",
"laravel/tinker": "^3.0",
"phpunit/phpunit": "^12.0",
"pestphp/pest": "^4.0"
```

3. Update the global installer

```bash
composer global update laravel/installer
```

Herd users update Herd itself so its bundled installer matches Laravel 13.

## AI SDK

First-party SDK for text, agents, images, audio, and embeddings.

```php
use App\Ai\Agents\SalesCoach;

$response = SalesCoach::make()->prompt('Analyze this sales transcript...');
return (string) $response;
```

```php
use Laravel\Ai\Image;
use Laravel\Ai\Audio;
use Illuminate\Support\Str;

$image = Image::of('A donut sitting on the kitchen counter')->generate();
$audio = Audio::of('I love coding with Laravel.')->generate();
$embeddings = Str::of('Napa Valley has great wine.')->toEmbeddings();
```

## JSON:API resources

`JsonApiResource` returns JSON:API responses (`Content-Type: application/vnd.api+json`), including relationships, sparse fieldsets, and links. See `Laravel/response.md` for the older `JsonResource` style.

```bash
php artisan make:resource PostResource --json-api
```

```php
namespace App\Http\Resources;

use Illuminate\Http\Resources\JsonApi\JsonApiResource;

class PostResource extends JsonApiResource
{
    public $attributes = [
        'title',
        'body',
        'created_at',
    ];

    public $relationships = [
        'author' => UserResource::class,
        'comments',
    ];
}
```

```php
return new PostResource($post);
return $post->toResource();
return PostResource::collection(Post::all());

// include=author,comments
// fields[posts]=title,created_at
```

## Queue routing

Set the default connection and queue for a job class in one place. See `Laravel/job.md`.

```php
use App\Jobs\ProcessPodcast;
use Illuminate\Support\Facades\Queue;

Queue::route(ProcessPodcast::class, connection: 'redis', queue: 'podcasts');
```

## PHP attributes

Controller middleware and authorization can sit on the class or method. See `Laravel/controller.md` and `Laravel/middleware.md`.

```php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Routing\Attributes\Controllers\Authorize;
use Illuminate\Routing\Attributes\Controllers\Middleware;

#[Middleware('auth')]
class CommentController
{
    #[Middleware('subscribed')]
    #[Authorize('create', [Comment::class, 'post'])]
    public function store(Post $post)
    {
        // ...
    }
}
```

Job retry settings can be attributes instead of public properties. See `Laravel/job.md` (`public $tries = 2`).

```php
use Illuminate\Queue\Attributes\Backoff;
use Illuminate\Queue\Attributes\FailOnTimeout;
use Illuminate\Queue\Attributes\Timeout;
use Illuminate\Queue\Attributes\Tries;

#[Tries(5)]
#[Backoff([1, 5, 10])]
#[Timeout(120)]
#[FailOnTimeout]
class ProcessPodcast implements ShouldQueue
{
    // ...
}
```

`#[Backoff(3)]` is a flat delay. `#[Backoff([1, 5, 10])]` waits 1, then 5, then 10 seconds.

## Cache::touch

Extend a cache item's TTL without reading and writing the value again.

```php
Cache::touch('stats', 3600);
```

Custom cache stores must implement `touch` on `Illuminate\Contracts\Cache\Store`:

```php
public function touch($key, $seconds);
```

## Vector search

Similarity search against embeddings, including PostgreSQL with `pgvector`.

```php
$documents = DB::table('documents')
    ->whereVectorSimilarTo('embedding', 'Best wineries in Napa Valley')
    ->limit(10)
    ->get();
```

## Request forgery protection

CSRF middleware was renamed. `VerifyCsrfToken` and `ValidateCsrfToken` still work as deprecated aliases. The new middleware also checks the request origin with the `Sec-Fetch-Site` header. See `Laravel/middleware.md`.

```php
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;

// Laravel <= 12
->withoutMiddleware([VerifyCsrfToken::class]);

// Laravel >= 13
->withoutMiddleware([PreventRequestForgery::class]);
```

The middleware config method is `preventRequestForgery(...)`.

## Cache prefix, session cookie, and session serialization

Default generated names now use hyphens. This only matters when the app does not already set `CACHE_PREFIX`, `REDIS_PREFIX`, and `SESSION_COOKIE`. See `Laravel/session.md`.

```php
// Laravel <= 12
Str::slug((string) env('APP_NAME', 'laravel'), '_').'_cache_';
Str::slug((string) env('APP_NAME', 'laravel'), '_').'_database_';
Str::slug((string) env('APP_NAME', 'laravel'), '_').'_session';

// Laravel >= 13
Str::slug((string) env('APP_NAME', 'laravel')).'-cache-';
Str::slug((string) env('APP_NAME', 'laravel')).'-database-';
Str::slug((string) env('APP_NAME', 'laravel')).'-session';
```

Set the old values in `.env` if existing cache keys and session cookies must keep working.

The Laravel 13 skeleton sets session serialization to `json` in `config/session.php`. Changing an existing app from `php` to `json` logs every user out. Leave it as `php` to keep active sessions. Use `json` when the session does not store PHP objects.

Cache unserialization is closed by default. Objects in cache must be listed, or stored as arrays instead.

```php
// config/cache.php
'serializable_classes' => [
    App\Data\CachedDashboardStats::class,
    App\Support\CachedPricingSnapshot::class,
],
```

`false` means no PHP objects may be unserialized from cache.

## Queue events

See `Laravel/job.md`.

```php
// JobAttempted
// Laravel <= 12
$event->exceptionOccurred; // bool

// Laravel >= 13
$event->exception; // exception or null

// QueueBusy
// Laravel <= 12
$event->connection;

// Laravel >= 13
$event->connectionName;
```

## Domain routes

Routes with an explicit domain are matched before routes that have no domain, even if the non-domain route was registered first. See `Laravel/routes.md`.

## Models and queries

1. Creating a model while that model is still booting throws `LogicException`.

```php
protected static function boot()
{
    parent::boot();

    // Laravel 13 throws LogicException
    (new static())->getTable();
}
```

Move that work out of `boot()` and trait `boot*` methods.

2. Inferred polymorphic pivot table names are now plural when a custom pivot class is used. Set `$table` on the pivot model if the old singular name must stay.

3. `upsert()` requires a non-empty `uniqueBy`. An empty list throws `InvalidArgumentException`. MySQL and MariaDB still use the table's primary and unique indexes, but the check runs anyway.

```php
User::upsert($rows, uniqueBy: ['email'], update: ['name']);
```

4. MySQL `DELETE` with `JOIN` now keeps `ORDER BY` and `LIMIT`. MySQL, and MariaDB before 11.8.1, can throw `QueryException` instead of ignoring those clauses.

5. Eloquent collections restored from a queue restore eager-loaded relations on the models.

## Pagination views

Bootstrap 3 paginator view names changed. See `Laravel/response.md`.

```text
// Laravel <= 12
pagination::default
pagination::simple-default

// Laravel >= 13
pagination::bootstrap-3
pagination::simple-bootstrap-3
```

## array_first and array_last

Laravel 13 depends on `symfony/polyfill-php85`. On PHP below 8.5 that polyfill defines global `array_first()` and `array_last()` if they are not already defined. The old `laravel/helpers` `array_first($array, $callback)` does not match the polyfill, which only returns the first element. See `Laravel/built_in_helper.md`.

```php
use Illuminate\Support\Arr;

Arr::first($array, function ($value) {
    return $value > 10;
});
```

## Convert Laravel 12 to 13

About 10 minutes for a normal app. Full list: https://laravel.com/docs/13.x/upgrade

1. PHP must be 8.3 or newer

```bash
php -v
```

2. In `composer.json`, set PHP and the framework packages

```json
"php": "^8.3",
"laravel/framework": "^13.0",
"laravel/boost": "^2.0",
"laravel/tinker": "^3.0",
"phpunit/phpunit": "^12.0",
"pestphp/pest": "^4.0"
```

Skip a package the app does not use. If Composer stops on another first-party package (`sanctum`, `breeze`, and so on), raise that package too until the update resolves.

3. Install the new constraints

```bash
composer update
```

4. Update the installer used to create new apps

```bash
composer global update laravel/installer
```

Herd: update Herd so its bundled installer matches Laravel 13.

5. Optional. On a Laravel 12 app with Laravel Boost `^2.0`, run `/upgrade-laravel-v13` in Cursor. That walks the same upgrade.

6. Change application code that the sections above call out

```php
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;

// was VerifyCsrfToken
->withoutMiddleware([PreventRequestForgery::class]);
```

```php
// JobAttempted: was $event->exceptionOccurred
$event->exception;

// QueueBusy: was $event->connection
$event->connectionName;
```

```text
pagination::bootstrap-3
pagination::simple-bootstrap-3
```

Also check:

- `upsert(..., uniqueBy: [])` — pass the real unique columns
- `new static()` inside `boot()` — move it out of boot
- `array_first($array, $callback)` — use `Arr::first()`
- a custom cache store — add `touch($key, $seconds)`
- a custom `Dispatcher`, `ResponseFactory`, `MustVerifyEmail`, or `Queue` contract — add the new methods from the upgrade guide

7. Config. Do this only if you copy the Laravel 13 skeleton files over the current ones.

Keep the old session serialization if users should stay logged in:

```php
// config/session.php
'serialization' => 'php',
```

Use `'json'` only when the session stores no PHP objects and a logout of every user is acceptable.

If cache keys or the session cookie were using the old generated names, set them in `.env` so they do not switch to hyphens:

```text
CACHE_PREFIX=your_app_cache_
REDIS_PREFIX=your_app_database_
SESSION_COOKIE=your_app_session
```

If the app stores PHP objects in cache, list those classes in `config/cache.php` under `serializable_classes`. Otherwise leave it `false`.

8. Compare the app skeleton and copy only the files you want

https://github.com/laravel/laravel/compare/12.x...13.x

9. Confirm the upgrade

```bash
php artisan --version
php artisan test
```

`php artisan --version` should report Laravel 13. Fix anything the tests or the sections above still flag.
