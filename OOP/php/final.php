<?php
// The final keyword can be used to prevent class inheritance or to prevent method overriding.
/*final class Car
{
    public function intro()
    {
    }
}

class Honda extends Car //  Class Honda cannot extend final class Car 
{
    // will result in error
    public function intro()
    {
    }
} */
class Animal
{
    final public function intro()
    {
    }
}

class Cat extends Animal //  Class Honda cannot extend final class Car 
{
    // Cannot override final method Animal::intro()PHP(PHP2440)
    // public function intro() // Cannot override final method Animal::intro()
    // {
    // }
}