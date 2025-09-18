# Introduction

## What is PHP

- PHP: Hypertext Preprocessor
- servers side scripting
- build dynamic web page
- free open source'

## Use Of PHP

- dynamic page content
- DB & file operations
- collect form data
- control user access
- encrypt data'

## Why PHP

- run on various os
- compatible with all server eg. apache iis
- wide range of database"

## print_r(variable,booleanFlag)

- **booleanFlag** default _false_
  - **true** it will return info return array

```php
$name = "John";
print_r($name);
$a = print_r($name,true); // won't print anything
print_r($a); // prints array
$b = print_r($name,false);
print_r($b);
```

```bash
Array
(
    [0] => John
)
Array
(
    [0] => John
)
Array
(
    [0] => John
)
1
```

## phpversion()

```php
echo phpversion()
```

```bash
8.2.28
```

## Case sensitive

```php
$color  = "color";
$COLOR  = "COLOR";
echo "Keywords are not case sensitive";
ECHO "but variable are case sensitive";
echo $color;
echo $COLOR;
```

```bash
Keywords are not case sensitive
but variable are case sensitive
color
COLOR
```

## Echo and print

| ECHO                         | PRINT             |
| ---------------------------- | ----------------- |
| no return value              | return value of 1 |
| can take multiple parameters | take one argument |
| marginally faster than print |                   |

```php
echo "Hello";
echo("Hello");
echo "This ", "string ", "was ", "made ", "with multiple parameters.";
$printReturn = print ("2");
echo ($printReturn);
```

```bash
Hello
Hello
This string was made with multiple parameters.
2
1
```

## variable with Data types

```php
$strVar = "This is string variable";
$intVar = 5; // integer variable
$floatVar = 5.5; // integer variable
$boolVar = false; // float variable
$arrVar = ['arr', 'variable', 5]; // array variable
$nullVar = null; // null variable

class Car
{
public $brand;
    public function __construct($brand)
{
$this->brand = $brand;
    }
}
$car = new Car("BMW"); // object
```

### var_dump

- var_dump is used to get datatype

```php
var_dump($car);
```

```bash
object(Car)#1 (1) {
  ["brand"]=>
  string(3) "BMW"
}
```

## PHP is loosely couple language

- you can change data type of variable

```php
$x = "x";
$x = 5;
echo (string) $x; // 5

```
