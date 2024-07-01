<?php

/*Indexed arrays - Arrays with a numeric index
Associative arrays - Arrays with named keys
Multidimensional arrays - Arrays containing one or more arrays */
function myFunction($num) // not works in array
{
    echo $num * $num;
}
$myArr = array("Volvo", 15, "apples", "bananas", "abc"); // create array like this
$myArr2 = ['a', 'b', 'c']; // create array like this
$myArr2["brand"] = "Ford";
$myArr2[] = "Ford New"; // add an array item
$myArr2[0] = "A1"; // update array element

// print_r($myArr2);
// print_r($myArr);
// print_r(count($myArr));
// print_r($myArr[2]);
// var_dump($myArr);
foreach ($myArr as $x) {
    echo "$x \n";
}
foreach ($myArr as $x => $y) {
    // echo "$x => $y\n";
}
array_push($myArr, "Ford");
// print_r($myArr[5]);


// PHP Associative Arrays
$cars = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
// var_dump($car);
// echo $cars["model"];
foreach ($cars as $x => $y) {
    // echo "$x: $y \n";
}

$fruits = array("Apple", "Banana", "Cherry");
array_push($fruits, "Orange", "Kiwi", "Lemon"); // add multiple item
print_r($fruits);
$cars += ["color" => "red"]; // add multiple item to associative array 
// print_r($cars);

// array_pop($fruits); // remove last item 
// print_r($fruits);
// $start = 1;
// $length = 2;
// array_splice($fruits, $start, $length); // With the array_splice() function you specify the index (where to start) and how many items you want to delete.

// print_r($fruits);
// unset($fruits[0]); // The unset() function does not re-arrange the indexes, meaning that after deletion the array will no longer contain the missing indexes.
// print_r($fruits);
// unset($fruits[0], $fruits[2]); // unset multiple item 
// print_r($fruits);

$cars = array(
    array("Volvo", 22, 18),
    array("BMW", 15, 13),
    array("Saab", 5, 2),
    array("Land Rover", 17, 15)
);
// PHP - Two-dimensional Arrays

// echo $cars[0][0] . ": In stock: " . $cars[0][1] . ", sold: " . $cars[0][2] . ".\n";
// echo $cars[1][0] . ": In stock: " . $cars[1][1] . ", sold: " . $cars[1][2] . ".\n";
// echo $cars[2][0] . ": In stock: " . $cars[2][1] . ", sold: " . $cars[2][2] . ".\n";
// echo $cars[3][0] . ": In stock: " . $cars[3][1] . ", sold: " . $cars[3][2] . ".\n";


for ($row = 0; $row < 4; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
        echo "<li>" . $cars[$row][$col] . "</li>";
    }
    echo "</ul>";
}