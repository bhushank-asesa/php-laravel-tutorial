## Casting

## Change Data Type

> Casting in PHP is done with these statements:

- **(string)** - Converts to data type String
- **(int)** - Converts to data type Integer
- **(float)** - Converts to data type Float
- **(bool)** - Converts to data type Boolean
- **(array)** - Converts to data type Array
- **(object)** - Converts to data type Object
- **(unset)** - Converts to data type NULL

## Cast to Integer

> To cast to integer, use the (int) statement:

```php
$c = "25 kilometers"; // String
$d = "kilometers 25"; // String
$e = "hello"; // String
$f = true;    // Boolean
$g = NULL;    // NULL

$c = (int) $c;
$d = (int) $d;
$e = (int) $e;
$f = (int) $f;
$g = (int) $g;
```

```bash
int(25)
int(0)
int(0)
int(1)
int(0)
```

- Same with float and 5 will be 5

## Cast to boolean

> If a value is 0, NULL, false, or empty, the (bool) converts it into false, otherwise true. Even -1 converts to true.

## Cast to array

```php
When converting into arrays, most data types converts into an indexed array with one element.

NULL values converts to an empty array object.
```

### Converting Objects into Arrays:

```php
class Car {
  public $color;
  public $model;
  public function __construct($color, $model) {
    $this->color = $color;
    $this->model = $model;
  }
  public function message() {
    return "My car is a " . $this->color . " " . $this->model . "!";
  }
}

$myCar = new Car("red", "Volvo");

$myCar = (array) $myCar;
var_dump($myCar);
```

```bash
array(2) {
  ["color"]=>
  string(3) "red"
  ["model"]=>
  string(5) "Volvo"
}
```

## Cast to object

```bash
object(stdClass)#4 (1) {
["scalar"]=>
bool(true)
}
object(stdClass)#5 (0) {
}
```

- When converting into objects, most data types converts into a object with one property, named "scalar", with the corresponding value.

- NULL values converts to an empty object
- Indexed arrays converts into objects with the index number as property name and the value as property value.

- Associative arrays converts into objects with the keys as property names and values as property values.

## Cast to NULL

To cast to NULL, use the (unset) statement:

```php
$a = (unset) $a; // null
```
