<?php

class Car
{
    public static $counter = 1;
    public static function carWelcome()
    {
        echo self::$counter++ . " " . __METHOD__ . " Welcome to Car\n";
    }
    public static function welcome()
    {
        self::carWelcome();
    }
}
echo Car::$counter; // 1
Car::carWelcome(); // 1 onwards
$car = new Car();
$car->welcome();
class Honda extends Car
{
    public function hondaWelcome()
    {
        Car::carWelcome();
        echo " Welcome to Honda\n";
    }
}
$honda = new Honda();
$honda->hondaWelcome();

