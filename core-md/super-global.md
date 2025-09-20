# Super Global

## List

```php
$GLOBALS
$_SERVER
$_REQUEST
$_POST
$_GET
$_FILES
$_ENV
$_COOKIE
$_SESSION
```

## $GLOBALS

```php
$x = 75;
function myFunction()
{
    $x = 10;
    echo $GLOBALS['x'] . " " . $x;
}
myFunction();
```

```bash
75 10
```

## $\_SERVER

> $\_SERVER is a PHP super global variable which holds information about headers, paths, and script locations.

```php
echo $_SERVER['PHP_SELF'];
echo $_SERVER['SERVER_NAME'];
echo $_SERVER['HTTP_HOST'];
echo $_SERVER['HTTP_REFERER'];
echo $_SERVER['HTTP_USER_AGENT'];
echo $_SERVER['SCRIPT_NAME'];
```

| Variable                    | Description                                                                                        |
| --------------------------- | -------------------------------------------------------------------------------------------------- |
| $\_SERVER['PHP_SELF']       | Returns the filename of the currently executing script                                             |
| $\_SERVER['SERVER_NAME']    | Returns the name of the host server (such as www.w3schools.com)                                    |
| $\_SERVER['REQUEST_METHOD'] | Returns the request method used to access the page (such as POST)                                  |
| $\_SERVER['HTTP_HOST']      | Returns the Host header from the current request                                                   |
| $\_SERVER['HTTP_REFERER']   | Returns the complete URL of the current page (not reliable because not all user-agents support it) |
| $\_SERVER['REMOTE_ADDR']    | Returns the IP address from where the user is viewing the current page                             |
| $\_SERVER['REMOTE_HOST']    | Returns the Host name from where the user is viewing the current page                              |
| $\_SERVER['SCRIPT_NAME']    | Returns the path of the current script                                                             |

## $\_REQUEST

- $\_REQUEST is a PHP super global variable which contains submitted form data, and all cookie data.

- In other words, $\_REQUEST is an array containing data from $\_GET, $\_POST, and $\_COOKIE.

- Syntax

```php
$_REQUEST['first_name']
```

## PHP $\_POST

- $\_POST contains an array of variables received via the HTTP POST method.
- two main ways to send variables via the HTTP Post method:
  - HTML forms
  - JavaScript HTTP requests
- Syntax

```php
$name = $_POST['fname'];
```

## PHP $\_GET

- $\_GET contains an array of variables received via the HTTP GET method.
- two main ways to send variables via the HTTP GET method:
  - HTML forms
  - JavaScript HTTP requests
- Syntax

```php
$name = $_GET['fname'];
```

## Session

```php
session_start();
$_SESSION["fav_color"] = "green";
// remove all session variables
session_unset();
// destroy the session
session_destroy();
```

## RegeX

```php
$str = "Visit W3Schools";
$pattern = "/w3schools/i";
echo preg_match($pattern, $str);
```

```bash
1
```
