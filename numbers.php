<?php

echo "PHP_INT_MAX " . PHP_INT_MAX . "\n"; // 9223372036854775807
echo "PHP_INT_MIN " . PHP_INT_MIN . "\n"; // -9223372036854775808
echo "PHP_INT_SIZE " . PHP_INT_SIZE . " bytes\n"; // 8
echo "is_int(5) " . is_int(5) . " is_int(5.5) " . is_int(5.5) . " is_int(\"abc\") " . is_int("abc") . "\n"; // 1 0 0
// is_long and is_integer are allies for is_int 

echo "PHP_FLOAT_MAX  " . PHP_FLOAT_MAX . "\n"; // 1.7976931348623E+308
echo "PHP_FLOAT_MIN  " . PHP_FLOAT_MIN . "\n"; // 2.2250738585072E-308
echo "PHP_FLOAT_DIG  " . PHP_FLOAT_DIG . " no. of decimal digits that can be rounded into a float and back without precision loss\n"; //15
echo "is_float(5) " . is_float(5) . " is_float(5.5) " . is_float(5.5) . " is_float(\"abc\") " . is_float("abc") . "\n"; // 0 1 0
// is_double for is_float

$x = 1.9e411;
var_dump($x); // float(INF)
echo 'is_infinite($x) ' . is_infinite($x) . "\n"; // 1
echo 'is_finite($x) ' . is_finite($x) . "\n"; // 0
echo 'is_nan(acos(8)) ' . is_nan(acos(8)) . "\n"; // 1
echo 'is_nan(5) ' . is_nan(5) . "\n"; // 0 
echo 'is_numeric(5) ' . is_numeric(5) . "\n"; // 1
echo 'is_numeric("5") ' . is_numeric("5") . "\n"; // 1
echo 'is_numeric("5a") ' . is_numeric("5a") . "\n";// 0 
echo "max(2, 4, 6, 8, 10) " . max(2, 4, 6, 8, 10) . " from list\n"; // 10 
echo "min(2, 4, 6, 8, 10) " . min(2, 4, 6, 8, 10) . " from list\n"; // 2
echo "rand(2,10) " . rand(2, 10) . "\n";

