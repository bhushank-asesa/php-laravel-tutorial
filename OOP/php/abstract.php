<?php
/* Abstract classes and methods are when the parent class has a named method, but need its child class(es) to fill out the tasks.

An abstract class is a class that contains at least one abstract method. An abstract method is a method that is declared, but not implemented in the code.*/
abstract class Car
{
    public $number;
    public function __construct($name)
    {
        $this->number = $name;
    }
    abstract public function intro();
    abstract public function returnIntro(): string;
}
class Honda extends Car
{
    public function intro()
    {
        echo "This is Honda car {$this->number}\n";
    }
    public function returnIntro(): string // same syntax needed as per parent
    {
        return "This is Honda car {$this->number}\n";
    }
}
$honda = new Honda("MH09XY1234");
$honda->intro();
$text = $honda->returnIntro();
echo $text;
// class Mercedes extends Car // error  Class Mercedes contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (Car::intro, Car::returnIntro)
// {

// }

/*

Interfaces cannot have properties, while abstract classes can
All interface methods must be public, while abstract class methods is public or protected
All methods in an interface are abstract, so they cannot be implemented in code and the abstract keyword is not necessary
Classes can implement an interface while inheriting from another class at the same time

*/