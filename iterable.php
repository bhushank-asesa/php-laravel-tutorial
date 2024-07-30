<?php

// An iterable is any value which can be looped through with a foreach() loop.


// The iterable keyword can be used as a data type of a function argument or as the return type of a function:


function printIterable(iterable $myIterable)
{
    foreach ($myIterable as $item) {
        echo $item;
    }
}

$arr = ["a", "b", "c"];
printIterable($arr);