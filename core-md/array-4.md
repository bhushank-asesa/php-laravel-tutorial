# Array Function

# array_key_exists()

- Checks if the specified key exists in the array

```php
$a = ["Volvo" => "XC90", "BMW" => "X5"];
echo (int) array_key_exists(key: "Volvo", array: $a); // 1
echo (int) array_key_exists(key: "Tata", array: $a); // 0
```

# array_keys()

- Returns all the keys of an array

```php
$a = ["Volvo" => "XC90", "BMW" => "X5", "Toyota" => "Highlander"];
print_r(array_keys(array: $a));
```

```bash
Array
(
    [0] => Volvo
    [1] => BMW
    [2] => Toyota
)
```

# array_map()

- Sends each value of an array to a user-made function, which returns new values

```php
function myFunction($v)
{
    return ($v * $v);
}
$a = [1, 2, 3, 4, 5];
print_r(array_map(callback: "myFunction", array: $a));
```

```bash
Array
(
    [0] => 1
    [1] => 4
    [2] => 9
    [3] => 16
    [4] => 25
)
```

# array_rand()

- Returns one or more random keys from an array

```php
$a = ["red", "green", "blue", "yellow", "brown"];
$random_keys = array_rand(array: $a, num: 3);
echo $a[$random_keys[0]];
echo $a[$random_keys[1]];
echo $a[$random_keys[2]];
```

```bash
red
green
blue
```

# array_reduce()

- Returns an array as a string, using a user-defined function

```php
function myFunction($v1, $v2)
{
    return $v1 . "-" . $v2;
}
$a = ["Dog", "Cat", "Horse"];
print_r(array_reduce(array: $a, callback: "myFunction"));
```

```bash
-Dog-Cat-Horse
```

## array_merge()

- Merges one or more arrays into one array

```php
$a1 = ["red", "green"];
$a2 = ["blue", "yellow"];
print_r(array_merge($a1, $a2));
```

```bash
Array
(
    [0] => red
    [1] => green
    [2] => blue
    [3] => yellow
)
```
