# String

## Length

```php
echo "Length of Hello world is " . strlen("Hello world!");
```

```bash
Length of Hello world is 12
```

## Word Count

```php
echo "Word count Hello world " . str_word_count("Hello world!");
```

```bash
Word count Hello world 2
```

## String position

```php
$string = "Hello world!";
$part = "world";
echo "world at " . strpos($string, $part);
```

```php
world at 6
```

- null for not found

## String Modification

```php
$string = "Hello world!";
echo "Upper Case " . strtoupper($string);
echo "Lower Case " . strtolower($string);

$to = "world";
$by = "Dolly";
$newStr = str_replace($to, $by, $string); // case sensitive
echo "Replace to $to by $by in above string " . $newStr;

echo "Reverse String ".strrev($string);
```

```bash
Upper Case HELLO WORLD!
Lower Case hello world!

Replace to world by Dolly in above string Hello Dolly!

Reverse String !dlrow olleH
```

## Trim

- Remove space

```php
$string = "  Hello world!  ";

echo "Trim ".trim($string);
echo "Left Trim ".ltrim($string);
echo "Right Trim ".rtrim($string);
```

```bash
Trim Hello world!
Left Trim Hello world!
Right Trim   Hello world!
```

## Implode and explode

```php
$b = "a_b_c";
$c = explode("_", $b);
$d = implode("*", $c);
print_r($c);
print_r($d);
```

```bash
Array
(
    [0] => a
    [1] => b
    [2] => c
)
a*b*c
```

## Slice String

```php
$string = "Hello World!";
$start = 6;
$length = 4;
echo "start to n length " . substr($string, $start, $length);
echo "start to end by default " . substr($string, $start); // end by default

$end = -6; // start from end
$endLength = 2;
echo "\nStart from end to length " . substr($string, $end, $endLength);

$endLen = -2
echo "\nOmits character if length is negative " . substr($string, $end, $endLen);
```

```bash
start to n length Worl
start to end by default World!

Start from end to length Wo

Omits character if length is negative Worl
```

## HereDoc

- double-quoted strings, without the double-quotes.
- don't need to escape quotes and expand variables

```php
$name = "Bhushan";
$string = <<<IDENTIFIER
place a string here
it can span multiple lines
and include single quote ' and double quotes "
$name
IDENTIFIER;

echo $string;
```

```bash
place a string here
it can span multiple lines
and include single quote ' and double quotes "
Bhushan
```

## Nowdoc Strings

> similar to a heredoc string except that it doesn't expand the variables, neither does it interpret the escape sequences.

```php
$lang="PHP";

$str = <<<'IDENTIFIER'
This is an example of Nowdoc string.
it can span multiple lines
and include single quote ' and double quotes "
IT doesn't expand the value of $lang variable
IDENTIFIER;

echo $str;
```

```bash
This is an example of Nowdoc string.
it can span multiple lines
and include single quote ' and double quotes "
IT doesn't expand the value of $lang variable
```
