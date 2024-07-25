# Miscellaneous

## Command to clear cache

- `php artisan config:clear`
- `php artisan cache:clear`
- `php artisan route:clear`
- `php artisan config:cache`

## `composer dump-autoload`

- To load file this `composer dump-autoload` command used

## Install new package

- composer require package-name

```bash
composer require barryvdh/laravel-dompdf
```

## View Route list

- `php artisan route:list`

## Create model with migration controller

```bash
php artisan make:model Wallet/ExternalWallet -m --resource
php artisan make:model Wallet/ExternalWallet -mc
```
