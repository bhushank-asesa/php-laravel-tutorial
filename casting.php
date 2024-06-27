<?php

// (string) - Converts to data type String
// (int) - Converts to data type Integer
// (float) - Converts to data type Float
// (bool) - Converts to data type Boolean
// (array) - Converts to data type Array
// (object) - Converts to data type Object
// (unset) - Converts to data type NULL

$a = 5;       // Integer
$b = 5.34;    // Float
$c = "25 kilometers"; // String
$d = "kilometers 25"; // String


$a = (int) $a;
$b = (int) $b;
$c = (int) $c;
$d = (int) $d;
$e = (int) null;
$f = (int) true;

echo var_dump($a) . "\n"; // int(5) 
echo var_dump($b) . "\n"; // int(5) 
echo var_dump($c) . "\n"; // int(25)
echo var_dump($d) . "\n"; // int(0)
echo var_dump($e) . "\n"; // int(0)
echo var_dump($f) . "\n"; // int(1)

$bc = 0;
$bg = "";
$bi = NULL;

// all of b* will (bool)$b* will give false

$arr_a = 5;       // Integer
$arr_b = 5.34;    // Float
$arr_c = "hello"; // String
$arr_d = true;    // Boolean
$arr_e = NULL;    // NULL

$arr_a_res = (array) $arr_a; // create array single element
$arr_e_res = (array) $arr_e;
$arr_d_res = (array) $arr_d;
print_r($arr_a_res); // [5]
print_r($arr_e_res); // []
print_r($arr_d_res); // [1]

// $unset_a = "a"; // no longer supported
// print_r((unset) $unset_a);//

$a = 5;       // Integer
$b = 5.34;    // Float
$c = "hello"; // String
$d = true;    // Boolean
$e = NULL;    // NULL

$a = (object) $a;
$b = (object) $b;
$c = (object) $c;
$d = (object) $d;
$e = (object) $e;

//To verify the type of any object in PHP, use the var_dump() function:
print_r($a); // stdClass Object([scalar] => 5)
print_r($b); // stdClass Object([scalar] => 5.34)
print_r($c); // stdClass Object([scalar] => hello)
print_r($d); // stdClass Object([scalar] => 1)
print_r($e); // stdClass Object()

$a = array("Volvo", "BMW", "Toyota"); // indexed array
$b = array("Peter" => "35", "Ben" => "37", "Joe" => "43"); // associative array

$a = (object) $a;
$b = (object) $b;
print_r($a); // stdClass Object([0] => Volvo [1] => BMW  [2] => Toyota)
print_r($b); // stdClass Object([Peter] => 35 [Ben] => 37 [Joe] => 43)


