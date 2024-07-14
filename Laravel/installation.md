# Installation of Laravel 11

## Prerequisites

1. PHP 8.0 +
2. Composer

## Commands

1. Using composer

```bash
composer create-project laravel/laravel demo-laravel-11
```

2. Using Laravel

```bash
composer global require laravel/installer
laravel new demo-laravel-11
```

## Run project

```bash
cd demo-laravel-11
php artisan serve --host=0.0.0.0 --port=5000
```

### Access project using

1. http://localhost:5000/
1. http://<your-IP-address>:5000/
