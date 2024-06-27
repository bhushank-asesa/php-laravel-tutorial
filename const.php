<?php

// define(name, value); // 
define("name", "Bhushan"); // default true
define("fnm", "Bhushan"); // php 8 accepts only false 
echo "\n" . name;
echo "\n" . fnm;
const lnm = "kumbhar";
echo "\n" . lnm;
// magic constants
echo "\n __DIR__ " . __DIR__ . "\n"; //	The directory of the file.	 // C:\xampp\htdocs\php-basic  
echo "__FILE__ " . __FILE__ . "\n"; //	The file name including the full path. // C:\xampp\htdocs\php-basic\const.php	
echo "__LINE__ " . __LINE__ . "\n"; //	The current line number.	// 13
echo "__line__ " . __LINE__ . "\n"; //	case insensitive.	// 14
echo "__NAMESPACE__ " . __NAMESPACE__ . "\n"; //	If used inside a namespace, the name of the namespace is returned.	


// ClassName::class	Returns the name of the specified class and the name of the namespace, if any.

class Car
{
    use Trait_a;
    public function __construct()
    {
        echo "__CLASS__ " . __CLASS__ . "\n"; //	If used inside a class, the class name is returned.	
    }
    function a()
    {
        echo "__METHOD__ " . __METHOD__ . "\n"; //	If used inside a function that belongs to a class, both class and function name is returned.	// Car::a
    }
}
$car = new Car();
$car->a();
$car->printTrait();
echo "Car::class " . Car::class; // Returns the name of the specified class and the name of the namespace, if any. // Car
function abc()
{
    echo "__FUNCTION__ " . __FUNCTION__ . "\n"; //	If inside a function, the function name is returned. // abc	
}
abc();


trait Trait_a
{
    function printTrait()
    {
        echo "__TRAIT__ " . __TRAIT__ . "\n"; //	If used inside a trait, the trait name is returned.	
    }
}