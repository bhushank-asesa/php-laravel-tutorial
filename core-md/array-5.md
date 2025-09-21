# Array Function

# array_slice()

- Returns selected parts of an array

```php
$a = array("red", "green", "blue", "yellow", "brown");
print_r(array_slice(array: $a, offset: 2));
```

```
Array
(
    [0] => blue
    [1] => yellow
    [2] => brown
)
```

# array_shift()

- Removes the first element from an array, and returns the value of the removed element

```php
$a = array("a" => "red", "b" => "green", "c" => "blue");
echo array_shift($a);
print_r($a);
```

```
red
Array
(
    [b] => green
    [c] => blue
)
```

# array_search()

- Searches an array for a given value and returns the key

```php
$a = array("a" => "red", "b" => "green", "c" => "blue");
echo array_search("red", $a);
```

```
a
```

# array_reverse()

- Returns an array in the reverse order

```php
$a = array("a" => "Volvo", "b" => "BMW", "c" => "Toyota");
print_r(array_reverse($a));
```

```
Array
(
    [c] => Toyota
    [b] => BMW
    [a] => Volvo
)
```

# array_intersect()

- Compare arrays, and returns the matches (compare values only)

```php
$a1 = ["a" => "red", "b" => "green", "c" => "blue", "d" => "yellow"];
$a2 = ["e" => "red", "f" => "green", "g" => "blue"];

$result = array_intersect($a1, $a2);
print_r($result);
```

```
Array
(
    [a] => red
    [b] => green
    [c] => blue
)
```
