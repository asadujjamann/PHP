<?php


/*

https://charm-ursinia-de9.notion.site/PHP-7b2eb050885546fb8f44b648c7be8a3b?pvs=25

array_push() // add element in last position
array_pop() // delete last element
array_unshift() // add element in first position
sort()
rsort()
array_sum()
array_slice()
array_splice()
in_array() // if this is exist on this array or not
explode() // convert string to array
implode() // convert array to string

Next Class
json  // study
loop
condition 
*/




// function myFunction(){
//     return "This is a function";
// }

// $myArray = array("Asad", 29, ["Yamaha", "Sujuki"], myFunction());

// echo $myArray[3]; // This is a function
// echo $myArray[2][0]; // Yamaha



// $cars = array("Audi", "Toyota", "Honda", "Tesla");
// echo "<pre>";
// var_dump($cars);
// print_r($cars);
// echo "</pre>";


// $cars = array("Audi", "Toyota", "Honda", "Tesla");
// echo $cars[0]; // Audi
// echo $cars[1]; // Toyota
// echo $cars[2]; // Honda


// $cars = array("Audi", "Toyota", "Honda");
// $cars[1] = "Tesla";

// echo "<pre>";
// print_r($cars);
// echo "</pre>";


// $cars = array("Audi", "BMW", "Toyota");
// foreach ($cars as $car){
//     echo "$car <br>";
// }

// $cars = array("Audi", "BMW", "Toyota");
// array_push($cars, "Honda");
// echo "<pre>";
// print_r($cars);
// echo "</pre>";



// $cars[5] = "Tesla";
// $cars[7] = "Mazda";
// $cars[12] = "BMW";

// array_push($cars, "Honda");
// echo "<pre>";
// print_r($cars);
// echo "</pre>";



// $cars = array("Audi", "Toyota", "Honda");

// echo "<pre>";
// $cars[1] = "Tesla";  // change value

// var_dump($cars); // Dispaly indexed array
// print_r($cars); // Dispaly indexed array

// echo $cars[2]; // Access indexed array
// echo "</pre>";




// $car = array(
//     "Brand" => "Tesla",
//     "Model" => "Cybertruck",
//     "Year" => 2003,
// );

// echo "<pre>";

// $car["Year"] = 2017; // Change Value
// var_dump($car); // Display array
// echo $car["Brand"]; // Access array

// echo "</pre>";




// $car = array(
//     "Brand" => "Tesla",
//     "Model" => "Cybertruck",
//     "Year" => 2003,
// );

// foreach ($car as $key => $value){
//     echo "$key: $value <br>";
// }




// $cars = array("Audi", "Toyota", "Honda");
// foreach($cars as &$changeCarsTo){
//     $changeCarsTo = "Tesla";
//     echo "$changeCarsTo <br>";
// }
// unset($changeCarsTo);

// $changeCarsTo = "BMW";

// echo "<pre>";
// var_dump($cars);
// echo "</pre>";




// $cars = array("Audi", "BMW", "Toyota");

// $cars[] = "Honda";

// echo "<pre>";
// print_r($cars);
// echo "</pre>";


// $car = array(
//     "Brand" => "Tesla",
//     "Model" => "Cybertruck",
//     "Year" => 2003,
// );

// echo "<pre>";

// $car["Year"] = 2017; // Change/Update Value
// $car["Owner"] = "Elon Musk"; // Add New Value
// var_dump($car); // Display array
// echo $car["Brand"]; // Access array

// echo "</pre>";





// $cars = array("Audi", "BMW", "Toyota");
// $cars_2 = ["Tesla", "Honda", "Fiat"];

// $carsMerged = array_merge($cars, $cars_2);

// echo "<pre>";
// print_r($carsMerged);
// echo "</pre>";



// $cars = ["A_Brand" => "Audi", "A_Model" => "A3 (8V)", "A_Year" => 2012];

// $cars_2 = ["T_Brand" => "Tesla", "T_Model" => "Cybertruck", "T_Year" => 2003];

// echo "<pre>";
// print_r(array_merge($cars, $cars_2));
// echo "</pre>";



/****

$cars = ["Audi", "BMW", "Fiat", "Kia"];
$delCar = array_splice($cars, 1, 2);

print_r($cars); 
// Array ( [0] => Audi [1] => Kia )
print_r($delCar);
// Array ( [0] => BMW [1] => Fiat )

****/



/****
$cars = ["Audi", "BMW", "Toyota"];
unset($cars[1]);

print_r($cars);
// Array ( [0] => Audi [2] => Toyota )
****/


/****
$cars = ["Audi", "BMW", "Toyota"];
unset($cars[0], $cars[1]);

print_r($cars); // Array ( [2] => Toyota )
****/


/****
$teslaCar = array( "Brand" => "Tesla", "Model" => "Cybertruck", "Year" => 2003 );

unset($teslaCar["Model"]);

print_r($teslaCar); // Array ( [Brand] => Tesla [Year] => 2003 )
****/


/****
$teslaCar = ["Brand" => "Tesla", "Model" => "Cybertruck", "Year" => 2003];
$cars = ["Audi", "BMW", "Fiat", "Kia"];

$newArrayOfTesla = array_diff($teslaCar, ["Cybertruck", 2003]);
print_r($newArrayOfTesla); echo "<br>";
// Array ( [Brand] => Tesla )
print_r($teslaCar); echo "<br>";
// Array ( [Brand] => Tesla [Model] => Cybertruck [Year] => 2003 )

$newArrayOfCars = array_diff($cars, ["Fiat", "Kia"]);
print_r($newArrayOfCars); echo "<br>";
// Array ( [0] => Audi [1] => BMW )
print_r($cars);
// Array ( [0] => Audi [1] => BMW [2] => Fiat [3] => Kia )

****/




/****
$teslaCar = ["Brand" => "Tesla", "Model" => "Cybertruck", "Year" => 2003];
$cars = ["Audi", "BMW", "Fiat", "Kia"];

$lastItemOfTesla = array_pop($teslaCar);
print_r($lastItemOfTesla); echo "<br>"; // 2003
print_r($teslaCar); echo "<br>";
// Array ( [Brand] => Tesla [Model] => Cybertruck )

$lastItemOfCars = array_pop($cars);
print_r($lastItemOfCars); echo "<br>"; // Kia
print_r($cars);
// Array ( [0] => Audi [1] => BMW [2] => Fiat )
****/





/****
$teslaCar = ["Brand" => "Tesla", "Model" => "Cybertruck", "Year" => 2003];
$cars = ["Audi", "BMW", "Fiat", "Kia"];

$firstItemOfTesla = array_shift($teslaCar);
print_r($firstItemOfTesla); echo "<br>"; // Tesla
print_r($teslaCar); echo "<br>";
// Array ( [Model] => Cybertruck [Year] => 2003 )

$firstItemOfCars = array_shift($cars);
print_r($firstItemOfCars); echo "<br>"; // Audi
print_r($cars);
// Array ( [0] => BMW [1] => Fiat [2] => Kia )
****/












// /****

// ****/

/*
Json
Using object, Using array

DRY - Dont Repeat Yourself

Loop -  for, while


echo "<pre>";

echo "</pre>";

echo "<br>";

*/






