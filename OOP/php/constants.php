<?php
class Goodbye
{
    const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!\n";
    const MESSAGE = "Simple Message\n";
    public function bye()
    {
        // use self::var_name in class to access constant
        echo self::LEAVING_MESSAGE;
    }
}

$goodbye = new Goodbye();
// echo Goodbye::message; // error Undefined constant Goodbye::message constant in class are case sensitive
echo Goodbye::MESSAGE;
$goodbye->bye();