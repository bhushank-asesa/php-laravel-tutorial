# Array

## Types

- **Indexed arrays** - Arrays with a numeric index
- **Associative arrays** - Arrays with named keys
- **Multidimensional arrays** - Arrays containing one or more arrays

## Create Array

```php
$myArr = array("Volvo", 15, "apples", "bananas", "abc");
$myArr2 = ['a', 'b', 'c'];
$arr3 = ["age"=>15, "name"=>"John"];
$arr4 = [];
```

## Access Arrays

```php
echo $myArr[0];
echo $arr3["name"];
```

## Change Value

```php
$myArr[1] = "Ford";
$arr3["age"] = 25;
```

## Loop Through an Indexed Array

- use a foreach loop

```php
foreach ($myArr as $x) {
  echo $x;
}
foreach ($arr3 as $x => $y) {
    echo "$x => $y\n";
}
```

## Modify Array

```php
array_push($myArr, "Tata"); // for index
array_push($myArr, "Orange", "Kiwi", "Lemon"); // multiple
$arr3 += ["standard" => 5, "division" => "b"];
$arr4[] = "abc";
```

## Array Keys

> When creating indexed arrays the keys are given automatically, starting at 0 and increased by 1 for each item, so the array above could also be created with keys:

> indexed arrays are the same as associative arrays, but associative arrays have names instead of numbers

> You can have arrays with both indexed and named keys:

## By reference

### Update Array Items in a Foreach Loop

> One way is to insert the & character in the assignment to assign the item value by reference, and thereby making sure that any changes done with the array item inside the loop will be done to the original array:

```php
$cars = array("Volvo", "BMW", "Toyota");
foreach ($cars as &$x) {
  $x = "Ford";
}
unset($x);
var_dump($cars);
```

```bash
array(3) {
  [0]=>
  string(4) "Ford"
  [1]=>
  string(4) "Ford"
  [2]=>
  string(4) "Ford"
}
```

> Note: Remember to add the unset() function after the loop. If omitted, the $x variable will remain as a reference to the last array item.

- Demonstrate the consequence of forgetting the unset() function:

```php
$cars = array("Volvo", "BMW", "Toyota");
foreach ($cars as &$x) {
$x = "Ford";
}
$x = "ice cream";
var_dump($cars);
```

```bash
array(3) {
  [0]=>
  string(4) "Ford"
  [1]=>
  string(4) "Ford"
  [2]=>
  string(4) "Ford"
}
```

## Remove Array Item

```php
$cars = array("Volvo", "BMW", "Toyota");
$start = 1;
$length = 1; // can be more to multiple
array_splice($cars, $start, $length);
print_r($cars);
$cars = array("Volvo", "BMW", "Toyota");
unset($cars[1]);
print_r($cars);
unset($cars[0], $cars[1]);  // multiple
unset($cars["model"]); // remove in associative
array_pop($cars); // remove last item
array_shift($cars); // remove first item
```

- The unset() function does not re-index the array.
- remove an element at index 1, the other elements (e.g., at index 0, 2, 3, etc.) will keep their original indices.
- leading to a "gap" in the sequence of indices.

```bash
Array
(
    [0] => Volvo
    [1] => Toyota
)
Array
(
    [0] => Volvo
    [2] => Toyota
)
```

## iterable

- An iterable is any value which can be looped through with a foreach() loop.
- The iterable keyword can be used as a data type of a function argument or as the return type of a function:

```php
function printIterable(iterable $myIterable)
{
    foreach ($myIterable as $item) {
      echo $item;
    }
}

$arr = ["a", "b", "c"];
printIterable($arr);
```
