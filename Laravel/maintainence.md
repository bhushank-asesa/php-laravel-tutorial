# Maintainence

1. Run command to go in maintainnce mode

```bash
 php artisan down
```

2. In view `resources\views\errors\503.blade.php`

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Will be right back</h1>
</body>
</html>
```

3. Bypass Maintenance Mode (Optional)

```bash
php artisan down --secret=abcdefgh
```

- `abcdefgh` is secret key
- access site by using http://localhost:<port_no>/<secret_key>

4. Remove maintaining mode

```bash
php artisan up
```
