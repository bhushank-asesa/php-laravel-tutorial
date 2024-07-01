<?php


$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("e" => "red", "f" => "green", "g" => "blue");
$a3 = array("a" => "red", "b" => "black", "h" => "yellow");

$result = array_diff($a1, $a2);
// print_r($result); // Array ( [d] => yellow  ) 

// array_diff(array1, array2, array3, ...);  array3 => Optional. More arrays to compare against

$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("e" => "red", "f" => "black", "g" => "purple");
$a3 = array("a" => "red", "b" => "black", "h" => "yellow");
$result = array_diff($a1, $a2, $a3);
// print_r($result);

$index = 3; //	Required. The first index of the returned array
$number = 3;	//Required. Specifies the number of elements to insert
$value = "Blue";//	Required. Specifies the value to use for filling the array
$a1 = array_fill($index, $number, $value);
// print_r($a1);

$arr = array("Volvo" => "XC90", "BMW" => "X5");
$key = "Volvo";
if (array_key_exists($key, $arr)) {
    // echo "Key exists!";
} else {
    // echo "Key does not exist!";
}
// print_r(array_keys($arr));

$a1 = array("red", "green");
$a2 = array("blue", "yellow");
// print_r(array_merge($a1, $a2)); // return new array

/* Tip: You can assign one array to the function, or as many as you like.

Note: If two or more array elements have the same key, the last one overrides the others.

Note: If you assign only one array to the array_merge() function, and the keys are integers, the function returns a new array with integer keys starting at 0 and increases by 1 for each value (See example below).

Tip: The difference between this function and the array_merge_recursive() function is when two or more array elements have the same key. Instead of override the keys, the array_merge_recursive() function makes the value as an array. */

$arr = array("red", "green", "blue", "yellow", "brown");
$keyLength = 3;
$random_keys = array_rand($arr, $keyLength); //  returns a random key from an array
$random_keys1 = array_rand($arr); //  returns a random key from an array // default 1 length
// print_r($random_keys);
// print_r($random_keys1);

$arr = array("a" => "red", "b" => "green", "c" => "blue");
$searchKeyword = "red";
// echo array_search($searchKeyword, $arr); // Search an array for the value "red" and return its key:

$arr = array("red", "green", "blue", "yellow", "brown", "pink");
$start = 2;
$length = 2;
// print_r(array_slice($arr, $start)); // Start slice from third array element, and return the rest of the elements in the array:
// print_r(array_slice($arr, $start, $length)); // Start slice from third array element, and return the 2 array element:
$length = -2;
// print_r(array_slice($arr, $start, $length)); // Start slice from third array element, and stops at last $length element:

$arr = array(5, 15, 25);
$arr2 = array("5", 5, 15, 25, "b");
$arr3 = array("a", 5, 15, 25, "b");
$arr4 = array("a", "b");
echo array_sum($arr); // 45 
echo array_sum($arr2); // 50
echo array_sum($arr3); // 50
echo array_sum($arr4); // 0

