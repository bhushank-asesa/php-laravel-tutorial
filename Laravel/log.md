# Custom Log

## Config
- `config\logging.php` _add in channels_
```php
'custom' => [
    'driver' => 'single',
    'path' => storage_path('logs/custom.log'),
    'level' => 'debug', // Log level (e.g., debug, info, warning, error)
],
'daily_custom' => [
    'driver' => 'daily',
    'path' => storage_path('logs/daily_custom.log'),
    'level' => env('LOG_LEVEL', 'debug'),
    'days' => 14,
],
```
## Command
- `php artisan config:cache`

## Use
- In any code 
```php
use Illuminate\Support\Facades\Log;

Log::channel('custom')->info("sample text message for custom log");
Log::channel('daily_custom')->info("sample text message for daily custom log");
