<?php

/* Interfaces allow you to specify what methods a class should implement.

Interfaces make it easy to use a variety of different classes in the same way. When one or more classes use the same interface, it is referred to as "polymorphism".

Polymorphism is one of the most important concepts in OOP. It describes the ability of something to have or to be displayed in more than one form.

*/
interface Food
{
    // public $name; // interface don't have properties
    public function likes();
}
interface Animal
{
    public function makeSound();
    // public function eat(); // Class Cat contains 1 abstract method and must therefore be declared abstract or implement the remaining method if not implemented in class
}
class Cat implements Animal, Food
{
    public function makeSound()
    {
        echo " Meow ";
    }
    public function likes()
    {
        echo " Milk ";
    }
}
class Dog implements Animal
{
    public function makeSound()
    {
        echo " Bark ";
    }
}
$cat = new Cat();
$cat->likes();
$dog = new Dog();
$animals = array($cat, $dog);
foreach ($animals as $animal) {
    $animal->makeSound();
}