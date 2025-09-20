# Numbers

## Integer

### rules for integers:

- must have at least one digit
- must NOT have a decimal point
- integer can be either positive or negative
- specified in three formats:
  - decimal (base 10),
  - hexadecimal (base 16 - prefixed with 0x),
  - octal (base 8 - prefixed with 0) or binary (base 2 - prefixed with 0b)

## Functions

```php
echo "PHP_INT_MAX " . PHP_INT_MAX;
echo "PHP_INT_MIN " . PHP_INT_MIN;
echo "PHP_INT_SIZE(bytes) " . PHP_INT_SIZE;
echo "is_int(5) " . is_int(5);
echo "is_int(5.5) " . is_int(5.5);
echo "is_int(\"abc\") " . is_int("abc");
```

- is_long and is_integer are allies for is_int

```bash
PHP_INT_MAX 9223372036854775807
PHP_INT_MIN -9223372036854775808
PHP_INT_SIZE(bytes)
8
is_int(5) 1
is_int(5.5)
is_int("abc")
```

## Float

```php
echo "PHP_FLOAT_MAX  " . PHP_FLOAT_MAX;
echo "PHP_FLOAT_MIN  " . PHP_FLOAT_MIN;
echo "PHP_FLOAT_DIG  " . PHP_FLOAT_DIG . " no. of decimal digits that can be rounded into a float and back without precision loss\n"; //15
echo "is_float(5) " . is_float(5);
echo "is_float(5.5) " . is_float(5.5);
echo "is_float(\"abc\") " . is_float("abc");
```

- is_double for is_float

```bash
PHP_FLOAT_MAX  1.7976931348623E+308
PHP_FLOAT_MIN  2.2250738585072E-308
PHP_FLOAT_DIG  15 no. of decimal digits that can be rounded into a float and back without precision loss
is_float(5)
is_float(5.5) 1
is_float("abc")
```

## Other Function

```php
$x = 1.9e411;
var_dump($x);
echo 'is_infinite($x) ' . is_infinite($x);
echo 'is_finite($x) ' . is_finite($x);
echo 'is_nan(acos(8)) ' . is_nan(acos(8));
echo 'is_nan(5) ' . is_nan(5);
echo 'is_numeric(5) ' . is_numeric(5);
echo 'is_numeric("5") ' . is_numeric("5");
echo 'is_numeric("5a") ' . is_numeric("5a");
```

```bash
float(INF)
is_infinite($x) 1
is_finite($x)
is_nan(acos(8)) 1
is_nan(5)
is_numeric(5) 1
is_numeric("5") 1
is_numeric("5a")
```
