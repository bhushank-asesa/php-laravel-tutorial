<?php
class Fruit
{
    public $name = "Default Name";
    protected $color;
    private $price = 10;

    function __construct($name)
    {
        $this->name = $name;
    }
    public function printValues($return = true)
    {
        $text = "Fruit name " . $this->name . " with price of " . $this->price . " like color " . $this->color;
        if ($return)
            return $text;
        echo $text;
    }
    public function setColorAndPrice($color, $price)
    {
        $this->color = $color;
        $this->price = $price;
    }
    private function setPrice($price)
    {
        $this->price = $price;
    }
    protected function setColor($color)
    {
        $this->color = $color;
    }
    public function setOtherValues($color, $price)
    {
        $this->setColor($color);
        $this->setPrice($price);
    }
}
$mango = new Fruit("Mango");
// $mango->color = "Yellow"; // error => Uncaught Error: Cannot access protected property Fruit::$color
// $mango->price = 20; // error => Cannot access private property Fruit::$price
$mango->setColorAndPrice("Yellow", 15);
// $mango->setColor("red"); // Call to protected method Fruit::setColor() from global scope
// $mango->setPrice(18); // Call to private method Fruit::setPrice() from global scope 
$mango->setOtherValues("red", 15);
$text = $mango->printValues();
echo $text;
