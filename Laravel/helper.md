# Helpers

1. create `app/Helpers/TextHelper.php` files
2. add it in composer.json file in auto-load

```php
"autoload": {
    "psr-4": {
        ...
    },
    "files": [
        "app/Helpers/TextHelper.php"
    ]
},
```

3. run `composer dump-autoload` after changes in composer.json changes

4. app/Helpers/TextHelper.php

```php

<?php
if (!function_exists('hashPass')) {
    function hashPass($string)
    {
        return hash('sha512', $string);
    }
}
```

5. Uses

```php
 echo "<h1>Welcome to Laravel 11 ".hashPass("Welcome") ;
```
