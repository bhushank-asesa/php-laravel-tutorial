<?php

/*Indexed arrays - Arrays with a numeric index
Associative arrays - Arrays with named keys
Multidimensional arrays - Arrays containing one or more arrays */
function myFunction($num)
{
    echo $num * $num;
}
$myArr = array("Volvo", 15, ["apples", "bananas"], myFunction);
echo $myArr[3]();