# Laravel 11 Configuration

## Database Configuration

1. in .env file set following

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_11
DB_USERNAME=root
DB_PASSWORD=
```

- Note: Laravel 11 has by default sqlite connection

2. In `config\database.php` add another mysql_2 database connection

```bash
'mysql_2' => [
    'driver' => 'mysql',
    'url' => env('DB_URL'),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => 'laravel_11_2',
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'unix_socket' => env('DB_SOCKET', ''),
    'charset' => env('DB_CHARSET', 'utf8mb4'),
    'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
    'prefix' => '',
    'prefix_indexes' => true,
    'strict' => true,
    'engine' => null,
    'options' => extension_loaded('pdo_mysql') ? array_filter([
        PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
    ]) : [],
],
```

- Change value as per your connection

- Usage

```bash
$mysql2Posts = DB::connection("mysql_2")->table("posts")->get();
$mysql1Posts = DB::connection("mysql")->table("posts")->get();
```

## MongoDB connection

### install laravel package for mongodb

```bash
composer require mongodb/laravel-mongodb
```

###

1.  Download Mongo DB from
    [Github](https://github.com/mongodb/mongo-php-driver/releases)
    `php_mongodb-1.19.3-8.2-ts-x64.zip`

2.  In `E:\xampp\php\php.ini` add extension `extension=php_mongodb.dll`
- php_mongodb is file name in above zip
