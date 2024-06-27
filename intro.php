<?php
$whatIsPHP = ['PHP: Hypertext Preprocessor', 'servers side scripting', "build dynamic web page", 'free open source'];
$useOfPHP = ['dynamic page content', 'DB & file operations', "collect form data", 'control user access', 'encrypt data'];
$whyPHP = ['run on various os', 'compatible with all server eg. apache iis', "wide range of database"];

/* $print_r_true = print_r($whatIsPHP,true); // when we use true it will return info return array
$print_r_false = print_r($useOfPHP,false); // when we use false it will return one and print array 
$print_r = print_r($useOfPHP); //default false it will return one and print array  */

// echo "PHP version (eg. 8.2.12) ".phpversion();

/* ECHO "keyword are not case sensitive ECHO \"statement\"; will work \n";
 EcHo "keyword are not case sensitive EcHo \"statement\"; will work \n";
 echo "keyword are not case sensitive echo \"statement\"; will work \n"; */

/* $color = "color";
 $COLOR = "COLOR";
 echo "\$COLOR($COLOR) is not same \$color($color), variable are case sensitive"; */

/* $echoVar = "EchoVar";
echo "1"; // does not return any value, may take more argument but in rare case use of multiple parameter -> in non () syntax
$printReturn = print ("2"); // return 1 and take only one argument
echo ($printReturn); // second argument will give error */

$strVar = "This is string variable";
$intVar = 5; // integer variable
$floatVar = 5.5; // integer variable
$boolVar = false; // float variable
$arrVar = ['arr', 'variable', 5]; // array variable
$nullVar = null; // null variable
class Car
{
    public $brand;
    public function __construct($brand)
    {
        $this->brand = $brand;
    }
}
$car = new Car("BMW");
var_dump($car); // var_dump is used to get datatype

// you can change data type of variable i.e. PHP is loosely couple language
$x = "x";
$x = 5;
echo (string) $x;