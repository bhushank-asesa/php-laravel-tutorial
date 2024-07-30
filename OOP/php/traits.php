<?php
/* 
PHP only supports single inheritance: a child class can inherit only from one single parent.

So, what if a class needs to inherit multiple behaviors? OOP traits solve this problem.

Traits are used to declare methods that can be used in multiple classes. Traits can have methods and abstract methods that can be used in multiple classes, and the methods can have any access modifier (public, private, or protected).

*/
trait Message_1
{
    public $name_1 = __TRAIT__;
    public function msg1($msg)
    {
        echo "In $this->name_1 " . $msg;
    }
}
trait Message_2
{
    public $name_2 = __TRAIT__;
    public function msg2($msg)
    {
        echo "In $this->name_2 " . $msg;
    }
}
class Welcome_1
{
    use Message_1;
}
class Welcome_2
{
    use Message_1, Message_2;
}
$w1 = new Welcome_1();
$w2 = new Welcome_2();

$w1->msg1("I am welcome 1\n");
$w2->msg1("I am welcome 2 1\n");
$w2->msg2("I am welcome 2 2\n");
