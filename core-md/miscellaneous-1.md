# Miscellaneous

## Switch

```php
switch (expression) {
    case label1:
        // code block
    break;
    case label2:
        // code block;
    break;
    case label3:
    // code block
    break;
    default:
    // code block
}
```

## Other Loop

- **while** - loops through a block of code as long as the specified condition is true
- **do...while** - loops through a block of code once, and then repeats the loop as long as the specified condition is true
- **for** - loops through a block of code a specified number of times
- **foreach** - loops through a block of code for each element in an array
- **continue** statement stops the current iteration in the for loop and continue with the next.
- **break** statement can be used to jump out of a for loop.

## Functions

- PHP is a Loosely Typed Language

```php
function addNumbers(int $a, int $b) {
  return $a + $b;
}
echo addNumbers(5, "5 days");
```

> since strict is NOT enabled "5 days" is changed to int(5), and it will return 10

> To specify strict we need to set declare(strict_types=1);. This must be on the very first line of the PHP file.

```php
declare(strict_types=1); // strict requirement

function addNumbers(int $a, int $b) {
  return $a + $b;
}
echo addNumbers(5, "5 days"); //  an error will be thrown
```

### PHP Return Type Declarations

```php
declare(strict_types=1); // strict requirement
function addNumbers(float $a, float $b) : float {
    // 6.4 will return and if int then 6
  return $a + $b;
}
echo addNumbers(1.2, 5.2);
```

## Operator

### Arithmetic Operators

|      |                           |                                         |
| ---- | ------------------------- | --------------------------------------- |
| -    | Addition $x + $y          | Sum of $x and $y                        |
| -    | Subtraction $x - $y       | Difference of $x and $y                 |
| \*   | Multiplication $x \* $y   | Product of $x and $y                    |
| /    | Division $x / $y          | Quotient of $x and $y                   |
| %    | Modulus $x % $y           | Remainder of $x divided by $y           |
| \*\* | Exponentiation $x \*\* $y | Result of raising $x to the $y'th power |

### Assignment Operators

|         |            |                  |
| ------- | ---------- | ---------------- |
| x = y   | x = y      | X get value of y |
| x += y  | x = x + y  | Addition         |
| x -= y  | x = x - y  | Subtraction      |
| x \_= y | x = x \_ y | Multiplication   |
| x /= y  | x = x / y  | Division         |
| x %= y  | x = x % y  | Modulus          |

---

### Comparison Operators

|     |                          |           |                                                                                                                                                   |
| --- | ------------------------ | --------- | ------------------------------------------------------------------------------------------------------------------------------------------------- |
| ==  | Equal                    | $x == $y  | Returns true if $x is equal to $y                                                                                                                 |
| === | Identical                | $x === $y | Returns true if $x is equal to $y, and they are of the same type                                                                                  |
| !=  | Not equal                | $x != $y  | Returns true if $x is not equal to $y                                                                                                             |
| <>  | Not equal                | $x <> $y  | Returns true if $x is not equal to $y                                                                                                             |
| !== | Not identical            | $x !== $y | Returns true if $x is not equal to $y, or they are not of the same type                                                                           |
| >   | Greater than             | $x > $y   | Returns true if $x is greater than $y                                                                                                             |
| <   | Less than                | $x < $y   | Returns true if $x is less than $y                                                                                                                |
| >=  | Greater than or equal to | $x >= $y  | Returns true if $x is greater than or equal to $y                                                                                                 |
| <=  | Less than or equal to    | $x <=$y   | Returns true if $x is less than or equal to $y                                                                                                    |
| <=> | Spaceship                | $x <=> $y | Returns an integer less than, equal to, or greater than zero, depending on if $x is less than, equal to, or greater than $y. Introduced in PHP 7. |

---

### Increment / Decrement Operators

|      |                                                      |
| ---- | ---------------------------------------------------- |
| ++$x | Pre-increment Increments $x by one, then returns $x  |
| $x++ | Post-increment Returns $x, then increments $x by one |
| --$x | Pre-decrement Decrements $x by one, then returns $x  |
| $x-- | Post-decrement Returns $x, then decrements $x by one |

---

### Logical Operators

|      |     |            |                                               |
| ---- | --- | ---------- | --------------------------------------------- |
| and  | And | $x and $y  | True if both $x and $y are true               |
| or   | Or  | $x or $y   | True if either $x or $y is true               |
| xor  | Xor | $x xor $y  | True if either $x or $y is true, but not both |
| &&   | And | $x && $y   | True if both $x and $y are true               |
| \|\| | Or  | $x \|\| $y | True if either $x or $y is true               |
| !    | Not | !$x        | True if $x is not true                        |

### String operator

|     |                          |                |                                  |
| --- | ------------------------ | -------------- | -------------------------------- |
| .   | Concatenation            | $txt1 . $txt2  | Concatenation of $txt1 and $txt2 |
| .=  | Concatenation assignment | $txt1 .= $txt2 | Appends $txt2 to $txt1           |

## Foreach with & iteration

```php
$arr = [
    [
        "a" => "a1"
    ],
    [
        "a" => "a2"
    ],
];
foreach ($arr as &$item) {
    $item['random_no'] = rand(10000, 99999);
}
print_r($arr);
```

> Need not to create the separate variable as **&$item** reflects in original array
