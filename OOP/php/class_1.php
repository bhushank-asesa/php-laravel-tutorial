<?php

class Fruit
{
    public $name = "Default Name";
    public $color;
    public $price = 10;

    function __construct($name)
    {
        // Constructor allows you to initialize an object's properties upon creation of the object.
        $this->name = $name;
    }
    public function setColor($color)
    {
        $this->color = $color;
    }
    public function printValues($return = true)
    {
        $text = "Fruit name " . $this->name . " with price of " . $this->price . " like color " . $this->color;
        if ($return)
            return $text;
        echo $text;
    }
    function __destruct()
    {
        // Destructor is called when the object is destructed or the script is stopped or exited.
        echo "\nThe fruit is {$this->name}.";
    }
}
$mango = new Fruit("Mango");
$mango->setColor("Yellow");
$mango->price = 20;
$text = $mango->printValues();
echo $text;
