# Array Function

## array_column()

- Returns the values from a single column in the input array

```php
$a = [
    ['id' => 5698, 'first_name' => 'Peter', 'last_name' => 'Griffin'],
    ['id' => 4767, 'first_name' => 'Ben', 'last_name' => 'Smith',],
    ['id' => 3809, 'first_name' => 'Joe', 'last_name' => 'Doe',]
];
$last_names = array_column(array: $a, column_key: 'last_name');
print_r($last_names);
```

```bash
Array
(
    [0] => Griffin
    [1] => Smith
    [2] => Doe
)
```

## array_chunk()

- Splits an array into chunks of arrays

```php
$cars = ["Volvo", "BMW", "Toyota", "Honda", "Mercedes", "Opel"];
print_r(array_chunk(array: $cars, length: 2));
```

```bash
Array
(
    [0] => Array
        (
            [0] => Volvo
            [1] => BMW
        )
    [1] => Array
        (
            [0] => Toyota
            [1] => Honda
        )
    [2] => Array
        (
            [0] => Mercedes
            [1] => Opel
        )
)
```

## array_fill()

- Fills an array with values

```php
$a1 = array_fill(start_index: 3, count: 4, value: "blue");
print_r($a1);
```

```bash
Array
(
    [3] => blue
    [4] => blue
    [5] => blue
    [6] => blue
)s
```

## array_filter()

- filters the values of an array using a callback function.

```php
function test_odd($var)
{
    return $var % 2 == 1;
}
$a1 = array(1, 3, 2, 3, 4);
print_r(array_filter(array: $a1, callback: "test_odd"));
```

```bash
Array
(
    [0] => 1
    [1] => 3
    [3] => 3
)
```

## array_sum()

- Returns the sum of the values in an array

```php
$a = [5, 15, 25];
echo array_sum(array: $a); // 45
```

## array_unique()

- Removes duplicate values from an array

```php
$a = ["a" => "red", "b" => "green", "c" => "red"];
print_r(value: array_unique($a));
```

```bash
Array
(
    [a] => red
    [b] => green
)
```

## array_values()

- Returns all the values of an array

```php
$a = ["Name" => "Peter", "Age" => "41", "Country" => "USA"];
print_r(array_values(array: $a));
```

```bash
Array
(
    [0] => Peter
    [1] => 41
    [2] => USA
)
```
