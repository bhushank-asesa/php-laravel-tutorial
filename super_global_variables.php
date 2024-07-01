<?php

/* 

$GLOBALS
$_SERVER
$_REQUEST
$_POST
$_GET
$_FILES
$_ENV
$_COOKIE
$_SESSION

*/

$x = 75;

function myFunction()
{
    $x = 10;
    echo "\n" . $GLOBALS['x'] . " " . $x; // 75 10
}
// $x = 25; // will print 25
myFunction();

// echo "\n" . $_SERVER['PHP_SELF']; // Returns the filename of the currently executing script
// echo "\n" . $_SERVER['SERVER_NAME']; // Returns the name of the host server (such as www.w3schools.com)
// echo "\n" . $_SERVER['HTTP_HOST']; //  Returns the Host header from the current request
// echo "\n" . $_SERVER['HTTP_REFERER']; // Returns the complete URL of the current page (not reliable because not all user-agents support it)
// echo "\n" . $_SERVER['HTTP_USER_AGENT']; //  
// echo "\n" . $_SERVER['SCRIPT_NAME']; //  Returns the path of the current script

// $_REQUEST is a PHP super global variable which contains submitted form data, and all cookie data.

// In other words, $_REQUEST is an array containing data from $_GET, $_POST, and $_COOKIE.


session_start();
$_SESSION["fav_color"] = "green";

// remove all session variables
session_unset();

// destroy the session
session_destroy();


$str = "Visit W3Schools";
$pattern = "/w3schools/i";
echo "\n" . preg_match($pattern, $str);