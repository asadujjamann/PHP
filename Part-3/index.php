<?php



/********** JSON == Start **********/

/****
$age = ["Mizan" => 30, "Asad" => "29", "Biplop" => 24];
$jsonEncodeAge = json_encode($age);
echo $jsonEncodeAge; // {"Mizan":30,"Asad":"29","Biplop":24}

$cars = ["Kia", "BMW", "Audi", "Fiat"];
$jsonEncodeCars = json_encode($cars);
echo $jsonEncodeCars; // ["Kia","BMW","Audi","Fiat"]

****/




/****
$jsonObjAge = '{"Mizan":30,"Asad":"29","Biplop":24}';
$jsonObjAgeDcode = json_decode($jsonObjAge);

var_dump($jsonObjAgeDcode);
print_r($jsonObjAgeDcode);

// access the decoded values from an object
echo $jsonObjAgeDcode -> Mizan; // 30
echo $jsonObjAgeDcode -> Asad; // 29
echo $jsonObjAgeDcode -> Biplop; // 24
****/




/****
$jsonObjAge = '{"Mizan":30,"Asad":"29","Biplop":24}';
$jsonObjAgeDcode = json_decode($jsonObjAge, true);

var_dump($jsonObjAgeDcode);
print_r($jsonObjAgeDcode);

// Access the decoded values from an Array
echo $jsonObjAgeDcode["Mizan"]; // 30
echo $jsonObjAgeDcode["Asad"]; // 29
echo $jsonObjAgeDcode["Biplop"]; // 24
****/




/****
$jsonObjAge = '{"Mizan":30,"Asad":"29","Biplop":24}';
$phpObjAge = json_decode($jsonObjAge);

foreach($phpObjAge as $key => $value){
    echo "The age of $key is $value <br>";
}
****/




/****
$jsonObjAge = '{"Mizan":30,"Asad":"29","Biplop":24}';
$phpArrayAge = json_decode($jsonObjAge, true);

foreach($phpArrayAge as $key => $value){
    echo "The age of $key is $value <br>";
}
****/

/********** JSON == End **********/








// /****

// ****/

/*
echo "<pre>";

echo "</pre>";

echo "<br>";


Json
Using object, Using array

DRY - Dont Repeat Yourself

Loop -  for, while

*/






/*
Conceptual Class
------------------

Dr Younus er vason take json a convert

https://watercss.kognise.dev/

https://github.com/faisal2410/json_ic

https://xdebug.org/

*/
