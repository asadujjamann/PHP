<?php

// include "Engine.php";

// class Car{
//     public $brand;
//     public $model;
//     public $engine;

//     public function __construct($brand, $model, $engine)
//     {
//         $this->brand = $brand;
//         $this->model = $model;
//         $this->engine = $engine;
//     }
// }

// $engine1 = new Engine("V8");

// $car1 = new Car("Tesla", "0011T", $engine1);
// echo "Engine Type: " . $car1->engine->type;  // Engine Type: V8




/*************** Combining Method and Property Chaining
include "Engine.php";

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


