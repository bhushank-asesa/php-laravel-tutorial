# OOP `Object-Oriented Programming.`

> Procedural programming is about writing procedures or functions that perform operations on the data, while object-oriented programming is about creating objects that contain both data and functions.

- several advantages over procedural programming:

  - OOP is faster and easier to execute
  - OOP provides a clear structure for the programs
  - OOP helps to keep the PHP code DRY "Don't Repeat Yourself", and makes the code easier to maintain, modify and debug
  - OOP makes it possible to create full reusable applications with less code and shorter development time

## Define a Class

> defined by using the class keyword, followed by the name of the class and a pair of curly braces ({}). All its properties and methods go inside the braces:

```php
class Fruit {
  // Properties
  public $name;
  public $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}
// define object
$banana = new Fruit();
$banana->set_name('Banana');
echo $banana->get_name();
```

- the `$this` keyword refers to the current object, and is only available inside methods.

## instanceof

> use the instanceof keyword to check if an object belongs to a specific class:

```php
$apple = new Fruit();
var_dump($apple instanceof Fruit);
```

```bash
bool(true)
```

## The \_\_construct() Function

> A constructor allows you to initialize an object's properties upon creation of the object.

> If you create a \_\_construct() function, PHP will automatically call this function when you create an object from a class.

```php
class Fruit {
  public $name;
  public $color;

  function __construct($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
  function __destruct() {
    echo "The fruit is {$this->name}.";
  }
}

$apple = new Fruit("Apple");
echo $apple->get_name();
```

- A destructor is called when the object is destructed or the script is stopped or exited.

- If you create a \_\_destruct() function, PHP will automatically call this function at the end of the script.

## PHP - Access Modifiers

Properties and methods can have access modifiers which control where they can be accessed.

- **public** - the property or method can be accessed from everywhere. This is default
- **protected** - the property or method can be accessed within the class and by classes derived from that class
- **private** - the property or method can ONLY be accessed within the class

## PHP OOP - Inheritance

- Inheritance in OOP = When a class derives from another class.

- The child class will inherit all the public and protected properties and methods from the parent class. In addition, it can have its own properties and methods.

```php
class Fruit {
  public $name;
  public $color;
  public function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }
  public function intro() {
    echo "The fruit is {$this->name} and the color is {$this->color}.";
  }
}

// Strawberry is inherited from Fruit
class Strawberry extends Fruit {
  public function message() {
    echo "Am I a fruit or a berry? ";
  }
}
$strawberry = new Strawberry("Strawberry", "red");
$strawberry->message();
$strawberry->intro();
```

## Overriding Inherited Methods

- Inherited methods can be overridden by redefining the methods (use the same name) in the child class.

```php
class Fruit {
  public $name;
  public $color;
  public function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }
  public function intro() {
    echo "The fruit is {$this->name} and the color is {$this->color}.";
  }
}

class Strawberry extends Fruit {
  public $weight;
  public function __construct($name, $color, $weight) {
    $this->name = $name;
    $this->color = $color;
    $this->weight = $weight;
  }
  public function intro() {
    echo "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram.";
  }
}

$strawberry = new Strawberry("Strawberry", "red", 50);
$strawberry->intro();
```

## Class Constants

> Class constants can be useful if you need to define some constant data within a class.

> Class constants are case-sensitive. However, it is recommended to name the constants in all uppercase letters.

We can access a constant from outside the class by using the class name followed by the scope resolution operator (::) followed by the constant name, like here:

```php
class Goodbye {
  const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";
  public function byeBye() {
    echo self::LEAVING_MESSAGE;
  }
}

$goodbye = new Goodbye();
$goodbye->byeBye();
```

- we can access a constant from inside the class by using the self keyword followed by the scope resolution operator (::) followed by the constant name, like here:
