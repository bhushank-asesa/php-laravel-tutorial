## Abstract Classes and Methods?

> abstract classes and methods are when the parent class has a named method, but need its child class(es) to fill out the tasks.

> An abstract class is a class that contains at least one abstract method. An abstract method is a method that is declared, but not implemented in the code.

```php
abstract class ParentClass {
  abstract public function someMethod1();
  abstract public function someMethod2($name, $color);
  abstract public function someMethod3() : string;
}
```

> So, when a child class is inherited from an abstract class, we have the following rules:

- The child class method must be defined with the same name and it redeclares the parent abstract method
- The child class method must be defined with the same or a less restricted access modifier
- The number of required arguments must be the same. However, the child class may have optional arguments in addition

```php
abstract class Car {
  public $name;
  public function __construct($name) {
    $this->name = $name;
  }
  abstract public function intro() : string;
}

// Child classes
class Audi extends Car {
  public function intro() : string {
    return "Choose German quality! I'm an $this->name!";
  }
}
$audi = new audi("Audi");
echo $audi->intro();
```

## Interfaces?

> Interfaces allow you to specify what methods a class should implement.

> Interfaces make it easy to use a variety of different classes in the same way. When one or more classes use the same interface, it is referred to as "polymorphism".

```php
interface InterfaceName {
  public function someMethod1();
  public function someMethod2($name, $color);
  public function someMethod3() : string;
}
```

### Interfaces vs. Abstract Classes

Interface are similar to abstract classes but difference are:

- Interfaces cannot have properties, while abstract classes can
- All interface methods must be public, while abstract class methods is public or protected
- All methods in an interface are abstract, so they cannot be implemented in code and the abstract keyword is not necessary
- Classes can implement an interface while inheriting from another class at the same time

### Example

```php
interface Animal {
  public function makeSound();
}

class Cat implements Animal {
  public function makeSound() {
    echo "Meow";
  }
}

$animal = new Cat();
$animal->makeSound();
```

## Traits?

> PHP only supports single inheritance: a child class can inherit only from one single parent.

> So, what if a class needs to inherit multiple behaviors? OOP traits solve this problem.

> Traits are used to declare methods that can be used in multiple classes. Traits can have methods and abstract methods that can be used in multiple classes, and the methods can have any access modifier (public, private, or protected).

```php
trait TraitName {
  // some code...
}

class MyClass {
  use TraitName;
}
```

### Example

```php
trait message1 {
public function msg1() {
    echo "OOP is fun! ";
  }
}
trait message2 {
  public function msg2() {
    echo "OOP reduces code duplication!";
  }
}
class Welcome {
  use message1,message2;
}
$obj = new Welcome();
$obj->msg1();
$obj->msg2();
```

## Static Methods and Properties

> Static methods can be called directly - without creating an instance of the class first.

> Static properties can be called directly - without creating an instance of a class.

```php
class ClassName {
  public static $staticProp = "W3Schools";
  public static function staticMethod() {
    echo "Hello World!";
  }
}
ClassName::staticMethod();
ClassName::$staticProp;

```

```php
class greeting {
  public static $pi = 3.14159;
  public static function welcome() {
    echo "Hello World!";
  }
}
// Call static method
greeting::welcome();
echo greeting::$pi;
```

## PHP Namespaces

> Namespaces are qualifiers that solve two different problems:

> They allow for better organization by grouping classes that work together to perform a task

> They allow the same name to be used for more than one class

### SyntaxGet

```php
namespace Html;
```

- `Note: A namespace declaration must be the first thing in the PHP file. The following code is invalid:`

```php
echo "Hello World!";
namespace Html;
```

### Example

```php
namespace Html;
class Table {
public $title = "";
  public $numRows = 0;
  public function message() {
    echo "<p>Table '{$this->title}' has {$this->numRows} rows.</p>";
  }
}
$table = new Table();
$table->title = "My table";
$table->numRows = 5;
// in another file
$table = new Html\Table();
$row = new Html\Row();

// in another file
use Html as H;
$table = new H\Table();
```
