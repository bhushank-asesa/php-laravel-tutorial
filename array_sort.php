<?php

// sort() - sort arrays in ascending order
// rsort() - sort arrays in descending order
// asort() - sort associative arrays in ascending order, according to the value
// ksort() - sort associative arrays in ascending order, according to the key
// arsort() - sort associative arrays in descending order, according to the value
// krsort() - sort associative arrays in descending order, according to the key

$arr_1 = array("1", "4", "2", "12", "9", "7");
sort($arr_1); // return 1 and sort array 
// print_r($arr_1);
rsort($arr_1); // return 1 and sort array reverse
// print_r($arr_1);

$arr_2 = array("name" => "bhushan", "age" => 30, "address" => "bapat camp");
$res = asort($arr_2); // return 1 and s sort associative arrays in ascending order, according to the value
// print_r($arr_2);
$res = ksort($arr_2); // return 1 and sort associative arrays in ascending order, according to the key
// print_r($arr_2);

$res = arsort($arr_2); // return 1 and s sort associative arrays in ascending order, according to the value reverse
print_r($arr_2);
$res = krsort($arr_2); // return 1 and sort associative arrays in ascending order, according to the key reverse
print_r($arr_2);