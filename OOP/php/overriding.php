<?php
// Inherited methods can be overridden by redefining the methods (use the same name) in the child class.


class Fruit
{
    public $name;
    public $color;
    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }
    public function intro()
    {
        echo "Parent Introduction The fruit is {$this->name} and the color is {$this->color}.\n";
    }
}

// Strawberry is inherited from Fruit
class Strawberry extends Fruit
{
    public $price = 15;
    public function __construct($name, $color, $price)
    {
        parent::__construct($name, $color);
        $this->price = $price;
    }
    public function intro()
    {
        echo "Child Introduction The fruit is {$this->name}, the color is {$this->color} and price is {$this->price}\n";

    }
}
$strawberry = new Strawberry("Strawberry", "red", 25);
$strawberry->intro();
