<?php 

/********** Uses of "this" keyword **********
class Person{
    public $firstName;
    public $lastName;

    public function __construct($firstName, $lastName){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    public function fullName(){
        return $this->firstName . " " . $this->lastName;
    }
    public function greet(){
        echo "Hello " . $this->fullName();
    }

}
$person1 = new Person("Asad", " Bin Hasan");
$person1->greet();
**********  **********/



/***************  Method Chaining
class Car {
    public $brand;
    public $model;
    public $color;
    
    public function setBrand($brand){
        $this->brand = $brand;
        return $this;
    }
    public function setModel($model){
        $this->model = $model;
        return $this;
    }
    public function setColor($color){
        $this->color = $color;
        return $this;
    }
    public function displayInfo(){
        $result = "Car: {$this->brand}, Model: {$this->model},  Color: {$this->color}";
        echo $result;
    }
}
$car1 = new Car();
// $car1->setBrand("Tesla");
// $car1->setModel("0011T");
// $car1->setColor("Red");
// $car1->displayInfo();

$car1->setBrand("Tesla")->setModel("0011T")->setColor("Red")->displayInfo(); // Method Chaining
***************/




/*************** Property Chaining
class Engine{
    public $type;
    public function __construct($type){
        $this->type = $type;
    }
}

class Car{
    public $brand;
    public $model;
    public $engine;

    public function __construct($brand, $model, $engine)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->engine = $engine;
    }
}

$engine1 = new Engine("V8");
$car1 = new Car("Tesla", "0011T", $engine1);
echo "Brand: {$car1->brand} <br>";
echo "Model: {$car1->model} <br>";
echo "Engine Type: {$car1->engine->type}"; // Property chaining
***************/




/*************** Combining Method and Property Chaining
class Engine{
    public $type;
    public function __construct($type)
    {
        $this->type = $type;
    }
    public function setType($type){
        $this->type = $type;
        return $this;
    }
}

class Car{
    public $brand;
    public $model;
    public $engine;

    public function __construct($brand, $model, $engine)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->engine = $engine;
    }
    public function setBrand($brand){
        $this->brand = $brand;
        return $this;
    }
    public function setModel($model){
        $this->model = $model;
        return $this;
    }
    public function displayInfo(){
        echo "[Brand: {$this->brand}] [Model: {$this->model}] [Engine: {$this->engine->type}]" . "<br>";
    }
}
$engine1 = new Engine("V8");
$car = new Car("Tesla", "0011T", $engine1);
$car->displayInfo();

$car->setBrand("BMW")->setModel("B44")->engine->setType("Bw23");
$car->displayInfo();

$car->setBrand("Toyota")->setModel("T44")->engine->setType("To23");
$car->displayInfo();
***************/




/***************
//// Fluent Interface: A fluent interface is a design pattern that allows method chaining to create a more readable and expressive code style. Fluent interfaces are common in frameworks like Laravel or Doctripe in PHP.

class QueryBuilder{
    protected $query;

    public function select($fields){
        $this->query .= "SELECT $fields ";
        return $this;
    }
    public function from($table){
        $this->query .= "FROM $table ";
        return $this;
    }
    public function where($condition){
        $this->query .= "WHERE $condition";
        return $this;
    }
    public function getQuery(){
        return $this->query . ";";
    }
}

$query = (new QueryBuilder())->select("*")->from("users")->where("id = 1")->getQuery();
echo $query;  // SELECT * FROM users WHERE id = 1;

***************/




// /***************

// ***************/




// /***************

// ***************/

