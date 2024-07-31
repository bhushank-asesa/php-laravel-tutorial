<?php
// echo "strlen(\"Hello world\") " . strlen("Hello world!"); // strlen("Hello world") 12
// echo "\nstr_word_count(\"Hello world\") " . str_word_count("Hello world!"); // str_word_count("Hello world") 2
// echo "\nstrpos(str,str_part) " . strpos("Hello world!", "world"); // strpos(str,str_part) 6

// modify string
/* $x = "india";
$y = "InDiA";
$z = "Hello World!";
$a = " Hello World! ";
echo "\nstrtoupper(\"india\") " . strtoupper($x) . "\nstrtolower(\"InDiA\") " . strtolower($y);
echo "\nstr_replace(replaced_to,replaced_by,replaced_in) " . str_replace("World", "Dolly", $z);
echo "\nstrrev($z) " . strrev($z) . "\ntrim($a) " . trim($a) . "\nltrim($a) " . ltrim($a) . "\nrtrim($a) " . rtrim($a);
// original variable does not change
*/
/* $b = "a_b_c";
$c = explode("_", $b);
$d = implode("*", $c);
print_r($c);
print_r($d); */

// Slicing Strings
/* $x = "Hello World!";
$start = 6;
$end = -6; // start from end
$length = 5;
$endLength = 2;
$endLen = -2; // to specify how many characters to omit, starting from the end of the string:
echo "\n" . substr($x, $start, $length); // World
echo "\n" . substr($x, $start); // till end if length not provided //World!
echo "\n" . substr($x, $end, $endLength); //  // Wo 
echo "\n" . substr($x, $end); // World!
echo "\n" . substr($x, $end, $endLen); // Worl
// \n is escape character
*/
// heredoc
$x = 5;
$y = 10;
$text = <<<TEXT
Line 1 $x
Line 2 $y
TEXT;

echo $text;
/* output 
Line 1 5
Line 2 10
*/

$text2 = <<<'TEXT'
Line 1 $x
Line 2 $y
TEXT;
echo "\n";
echo $text2;
/* output 
Line 1 $x
Line 2 $y
*/






