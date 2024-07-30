<?php

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
        echo "Public Introduction The fruit is {$this->name} and the color is {$this->color}.\n";
    }
    protected function introduction()
    {
        echo "Protected Introduction The fruit is {$this->name} and the color is {$this->color}.\n";
        $this->privateIntro();
    }
    private function privateIntro()
    {
        echo "private Introduction The fruit is {$this->name} and the color is {$this->color}.\n";
    }
}

// Strawberry is inherited from Fruit
class Strawberry extends Fruit
{
    public function message()
    {
        $this->introduction();
        // $this->privateIntro(); // Call to private method Fruit::privateIntro() from scope Strawberry 
        echo "Am I a fruit or a berry with {$this->color}? ";
    }
}
$strawberry = new Strawberry("Strawberry", "red");
// $strawberry->intro();
$strawberry->message();
// $strawberry->privateIntro(); // Call to private method Fruit::privateIntro() from global scope
// $strawberry->introduction(); //  Call to protected method Fruit::introduction() from global scope