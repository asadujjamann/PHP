<?php

/*
$code = "PHP";
echo "I love $code!";
*/





// Gobal Scope Variable

/*
$x = 5;

function myTest() {
   echo "<p>Variable x inside function is: $x</p>";
}
myTest();

echo "<p>Variable x outside function is: $x</p>";
*/


// now the $x, $y variables can be accesible in the function
/*
$x = 5;
$y = 6;

function myCalc(){
    global $x, $y;
    $z = $x + $y;
    return $z;
}
echo myCalc();
*/


/*
$x = 5;
$y = 6;

function myCalc(){
    $x = $GLOBALS['x'] = 10;
    $y = $GLOBALS['y'] = 15;
    $z = $x + $y;
    return $z;
}
echo myCalc();
*/




// Local Scope Variable
/*
function myCalc(){
    $x = 5;
}
myCalc();
echo $x;
*/


// Static Keyword

// function myFunction(){
//     static $x = 10;
//     echo $x;
//     $x++;
// }
// myFunction();
// myFunction();
// myFunction();


// $myName = " Asad ";
// $myNumber = 54;
// var_dump($myName);
// var_dump($myNumber);


// $cars = array("Volvo","BMW","Toyota");
// $cars = ["Volvo","BMW","Toyota"];
// var_dump($cars);


// $myName;
// var_dump($myName);


// $myNum = 6954;
// $myNum = (string) $myNum;
// var_dump($myNum);


// $myStrlen = "Hello Asad!";
// echo strlen($myStrlen);


// $myStrword = "Hello Asad! Welcome to PHP learning course.";
// echo str_word_count($myStrword);


// $myStrsearch = "Hello Asad! How are you Asad?";
// echo strpos($myStrsearch, "Asad");
// var_dump(strpos($myStrsearch, "World"));


// $text = "Beautiful Bangladesh!";
// $textUpper = strtoupper($text);
// echo $textUpper;


// $text = "Beautiful Bangladesh!";
// $textUpper = strtolower($text);
// echo $textUpper;


// $text = "Beautiful Bangladesh!, There are many beautiful places in Bangladesh";
// $stingReplace = str_replace("Beautiful", "Amazing", $text);
// $stingReplace2 = str_replace("Bangladesh", "Dinajpur", $text);
// echo $stingReplace;
// echo $stingReplace2;


// $text = "Hello Bangladesh!";
// $stringReverse = strrev($text);
// echo $stringReverse; // !hsedalgnaB olleH


// $text = "   Hello Asad   ";
// $trimText = trim($text);
// echo $trimText; // Hello Asad

// var_dump($trimText); // string(10) "Hello Asad"
// var_dump($text); // string(16) "   Hello Asad   "


// $cars = "BMW Toyota Audi Tata";
// $carsArray = explode(" ", $cars);
// print_r($carsArray);
// /*
// Array
// (
//     [0] => BMW
//     [1] => Toyota
//     [2] => Audi
//     [3] => Tata
// )
// */
// echo $carsArray[0]; // BMW
// echo $carsArray[1]; // Toyota


// $fName = "Asad Bin";
// $lName = "Hasan";
// $fullName = $fName . " " . $lName;
// echo $fullName; // Asad Bin Hasan

// $fName = "Asad Bin";
// $lName = "Hasan";
// $fullName = "$fName $lName";
// echo $fullName; // Asad Bin Hasan


// $text = "Hello Bangladesh!. Welcome Bangladesh";
// $sliceText = substr($text, 6);
// echo $sliceText; // Bangladesh!. Welcome Bangladesh

// $sliceText2 = substr($text, 6, 10);
// echo $sliceText2; // Bangladesh


// $text = "Hello Bangladesh!. Welcome Bangladesh";
// $sliceText = substr($text, -18);
// echo $sliceText; // Welcome Bangladesh

// $sliceText2 = substr($text, -18, 7);
// echo $sliceText2; // Welcome


// $text = "Hello, How are you?";
// $sliceText = substr($text, 7, -5); // first slice from begening at 7th position and second slice is from end 5th position;
// echo $sliceText; // How are

// $sliceText2 = substr($text, 7, -1);
// echo $sliceText2; // How are you


// $text = "You can write a new line using \"\\n\" in \"PHP\" ";
// echo $text; // You can write a new line using "\n" in "PHP"


// $x = 'We are the so-called \'Vikings\' from the north.';
// echo $x;


// $myNumber = 6954;
// $myNumber2 = 69.54;
// var_dump(is_integer($myNumber)); // bool(true)
// var_dump(is_integer($myNumber2)); // bool(false)


// echo PHP_INT_MAX;
// echo PHP_INT_MIN;
// echo PHP_INT_SIZE;


// $myNumber = 6954;
// $myNumber2 = 69.54;
// var_dump(is_float($myNumber)); // bool(false)
// var_dump(is_float($myNumber2)); // bool(true)


// echo PHP_INT_MAX;

// $myNumber = 1.29e411;
// var_dump($myNumber); // float(INF)
// var_dump(is_finite($myNumber)); // bool(false)
// var_dump(is_infinite($myNumber)); // bool(true)


// $checkNumber = 2;
// $checkNumber2 = acos(2);
// var_dump(is_nan($checkNumber)); // bool(false)
// var_dump(is_nan($checkNumber2)); // bool(true)



// $checkNumeric = 6954;
// var_dump(is_numeric($checkNumeric)); // bool(true)

// $checkNumeric2 = "6954";
// var_dump(is_numeric($checkNumeric2)); // bool(true)

// $checkNumeric3 = "69.54" + 100;
// var_dump(is_numeric($checkNumeric3)); // bool(true)

// $checkNumeric4 = "Hello";
// var_dump(is_numeric($checkNumeric4)); // bool(false)



// $a = 954;     // Integer
// $b = 9.54;    // Float
// $c = "Asad";  // String
// $d = true;    // Boolean
// $e = NULL;    // NULL

// $a = (string) $a;
// $b = (string) $b;
// $c = (string) $c;
// $d = (string) $d;
// $e = (string) $e;

// var_dump($a); // string(3) "954"
// var_dump($b); // string(3) "9.54"
// var_dump($c); // string(4) "Asad"
// var_dump($d); // string(1) "1"
// var_dump($e); // string(0) ""




// $a = 954;     // Integer
// $b = 9.54;    // Float
// $c = "25 kilometers"; // String
// $d = "kilometers 25"; // String
// $e = "Asad";  // String
// $f = true;    // Boolean
// $g = NULL;    // NULL

// $a = (int) $a;
// $b = (int) $b;
// $c = (int) $c;
// $d = (int) $d;
// $e = (int) $e;
// $f = (int) $f;
// $g = (int) $g;

// var_dump($a); // int(954)
// var_dump($b); // int(9)
// var_dump($c); // int(25)
// var_dump($d); // int(0)
// var_dump($e); // int(0)
// var_dump($f); // int(1)
// var_dump($g); // int(0)

// // When casting a string that starts with a number, the (int) function uses that number. If it does not start with a number, the (int) function convert strings into the number 0



// $a = 954;     // Integer
// $b = 9.54;    // Float
// $c = "25 kilometers"; // String
// $d = "kilometers 25"; // String
// $e = "Asad";  // String
// $f = true;    // Boolean
// $g = NULL;    // NULL

// $a = (float) $a;
// $b = (float) $b;
// $c = (float) $c;
// $d = (float) $d;
// $e = (float) $e;
// $f = (float) $f;
// $g = (float) $g;

// var_dump($a); // float(954)
// var_dump($b); // float(9.54)
// var_dump($c); // float(25)
// var_dump($d); // float(0)
// var_dump($e); // float(0)
// var_dump($f); // float(1)
// var_dump($g); // float(0)

// // When casting a string that starts with a number, the (float) function uses that number. If it does not start with a number, the (float) function convert strings into the number 0




// $a = 954;     // Integer
// $b = 9.54;    // Float
// $c = 0;       // Integer
// $d = -1;      // Integer
// $e = 0.1;     // Float
// $f = "Asad";  // String
// $g = "";      // String
// $h = true;    // Boolean
// $i = NULL;    // NULL

// $a = (bool) $a;
// $b = (bool) $b;
// $c = (bool) $c;
// $d = (bool) $d;
// $e = (bool) $e;
// $f = (bool) $f;
// $g = (bool) $g;
// $h = (bool) $h;
// $i = (bool) $i;

// var_dump($a); // bool(true)
// var_dump($b); // bool(true)
// var_dump($c); // bool(false)
// var_dump($d); // bool(true)
// var_dump($e); // bool(true)
// var_dump($f); // bool(true)
// var_dump($g); // bool(false)
// var_dump($h); // bool(true)
// var_dump($i); // bool(false)

// // If a value is 0, NULL, false, or empty, the (bool) converts it into false, otherwise true. Even -1 converts to true



// $a = 954;     // Integer
// $b = 9.54;    // Float
// $c = "Asad";  // String
// $d = true;    // Boolean
// $e = NULL;    // NULL

// $a = (array) $a;
// $b = (array) $b;
// $c = (array) $c;
// $d = (array) $d;
// $e = (array) $e;

// var_dump($a);
// var_dump($b);
// var_dump($c);
// var_dump($d);
// var_dump($e);
// /*
// array(1) {
//     [0] => int(954)
// }
// array(1) {
//     [0] => float(9.54)
// }
// array(1) {
//     [0] => string(4) "Asad"
// }
// array(1) {
//     [0] => bool(true)
// }
// array(0) {
// }
// */

// // When converting into arrays, most data types converts into an indexed array with one element. NULL values converts to an empty array object





// $a = 954;     // Integer
// $b = 9.54;    // Float
// $c = "Asad";  // String
// $d = true;    // Boolean
// $e = NULL;    // NULL

// $a = (object) $a;
// $b = (object) $b;
// $c = (object) $c;
// $d = (object) $d;
// $e = (object) $e;

// var_dump($a);
// var_dump($b);
// var_dump($c);
// var_dump($d);
// var_dump($e);

// /*
// object(stdClass)#1 (1) {
//     ["scalar"] => int(954)
// }
// object(stdClass)#2 (1) {
//     ["scalar"] => float(9.54)
// }
// object(stdClass)#3 (1) {
//     ["scalar"] => string(4) "Asad"
// }
// object(stdClass)#4 (1) {
//     ["scalar"] => bool(true)
// }
// object(stdClass)#5 (0) {
// }
// */

// // When converting into objects, most data types converts into a object with one property, named "scalar", with the corresponding value. NULL values converts to an empty object.




// $cars = array("Volvo", "BMW", "Toyota"); // indexed array
// $persons = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"); // associative array

// $cars = (object) $cars;
// $persons = (object) $persons;

// var_dump($cars);
// var_dump($persons);

// /*
// object(stdClass)#1 (3) {
//     ["0"] => string(5) "Volvo"
//     ["1"] => string(3) "BMW"
//     ["2"] => string(6) "Toyota"
// }
// object(stdClass)#2 (3) {
//     ["Peter"] => string(2) "35"
//     ["Ben"] => string(2) "37"
//     ["Joe"] => string(2) "43"
// }
// */

// // Indexed arrays converts into objects with the index number as property name and the value as property value.
// // Associative arrays converts into objects with the keys as property names and values as property values.


// $a = 5;       // Integer
// $b = 5.34;    // Float
// $c = "hello"; // String
// $d = true;    // Boolean
// $e = NULL;    // NULL

// $a = (unset) $a;
// $b = (unset) $b;
// $c = (unset) $c;
// $d = (unset) $d;
// $e = (unset) $e;

// //To verify the type of any object in PHP, use the var_dump() function:
// var_dump($a); // Null
// var_dump($b); // Null
// var_dump($c); // Null
// var_dump($d); // Null
// var_dump($e); // Null


// echo pi(); // 3.1415926535898


// echo min(0, 150, 30, 20, -8, -200); // -200
// echo max(0, 150, 30, 20, -8, -200); // 150

// $values = [0, 150, 30, 20, -8, -200];
// $minValue = min($values);
// echo $minValue; // -200

// $values = [0, 150, 30, 20, -8, -200];
// $maxValue = max($values);
// echo $maxValue; // 150


// echo abs(-9.54); // 9.54

// echo sqrt(144); // 12

// echo(round(0.60)); // 1
// echo(round(0.49)); // 0
// echo round(4.5); // 5
// echo round(4.49); // 4


// echo rand(); // between 10 digits random number
// echo rand(10, 100); // random number between 10 and 100


// define("GREETING", "Welcome to Bangladesh!");
// echo GREETING;

// const CODING = "I love PHP coding";
// echo CODING;


// define("COLORS", ["Red", "Green", "Blue"]);
// echo COLORS[1];


// define("GREETING", "Welcome to Bangladesh!");
// function myGreeting(){
//     echo GREETING;
// }
// myGreeting();


// function myColors(){
//     define("COLORS", ["Red", "Green", "Blue"]);
// }
// myColors();
// echo COLORS[2];


// class Fruits {
//     public function myValue(){
//         return __CLASS__;
//     }
// }
// $myFruits = new Fruits();
// echo $myFruits->myValue(); // Fruits


// echo __DIR__; // /Applications/MAMP/htdocs/learn_php

// echo __FILE__; // /Applications/MAMP/htdocs/learn_php/index.php


// function myValue(){
//     return __FUNCTION__;
// }
// echo myValue(); // myValue
// var_dump(myValue()); // string(7) "myValue"


// echo __LINE__; // curren line number in code


// class Fruits {
//     public function myValue(){
//         return __METHOD__;
//     }
// }
// $myFruits = new Fruits();
// echo $myFruits->myValue(); // Fruits::myValue
// var_dump($myFruits->myValue()); // string(15) "Fruits::myValue"



// namespace myArea;

// function myValue(){
//     return __NAMESPACE__;
// }
// echo myValue(); // myArea



// trait message1 {
//     public function msg1(){
//         echo __TRAIT__;
//     }
// }

// class Welcome {
//     use message1;
// }

// $obj = new Welcome();
// $obj -> msg1();




// namespace myArea;
// class Fruits {
//     public function myValue(){
//         return Fruits::class;
//     }
// }
// $myFruit = new Fruits();
// echo $myFruit -> myValue(); // myArea\Fruits



// $x = 5;
// $y = 4;
// echo $x + $y; // 9

// $x = 5;
// $y = 4;
// echo $x - $y; // 1

// $x = 5;
// $y = 4;
// echo $x * $y; // 20

// $x = 5;
// $y = 4;
// echo $x / $y; // 1.25

// $x = 5;
// $y = 4;
// echo $x % $y; // 1

// $x = 5;
// $y = 4;
// echo $x ** $y; // 625

// $x = 5;
// $x += 4;
// echo $x;  // 9 

// $x = 5;
// $x **= 4;
// echo $x;  // 9 

// $x = 5;
// $y = "5";
// var_dump($x == $y);  // bool(true)

// $x = 5;
// $y = "5";
// var_dump($x === $y);  // bool(false)

// $x = 5;
// $y = "4";
// var_dump($x != $y);  // bool(true)

// $x = 5;
// $y = "4";
// var_dump($x <> $y);  // bool(true)

// $x = 5;
// $y = "4";
// var_dump($x !== $y);  // bool(true)

// $x = 5;
// $y = "4";
// var_dump($x > $y);  // bool(true)

// $x = 5;
// $y = 4;
// var_dump($x >= $y);  // bool(true)




// $x = 5;  
// $y = 10;

// echo ($x <=> $y); // returns -1 because $x is less than $y
// echo "\n";

// $x = 10;  
// $y = 10;

// echo ($x <=> $y); // returns 0 because values are equal
// echo "\n";

// $x = 15;  
// $y = 10;

// echo ($x <=> $y); // returns +1 because $x is greater than $y




// $x = 5;
// echo $x++; // 5
// echo $x; // 6

// $x = 5;
// echo ++$x; // 6
// echo $x; // 6

// $x = 5;
// echo --$x;  // 4
// echo $x;  // 4

// $x = 5;
// echo $x--;  // 5
// echo $x;  // 4


// $x = 100;
// $y = 50;
// if($x == 100 and $y == 50){
//     echo "This is a example of \"and\" operator";
//     // This is a example of "and" operator
// }


// $x = 100;
// $y = 50;
// if($x == 100 or $y == 50){
//     echo "This is an example of \"or\" operator";
//     // This is an example of "or" operator
// }


// $x = 100;
// $y = 50;
// if($x == 100 xor $y == 70){
//     echo "This is an example of \"xor\" operator";
//     // This is an example of "xor" operator
// }


// $x = 100;
// $y = 50;
// if($x == 100 || $y == 70){
//     echo "This is an example of \"||\" operator";
//     // This is an example of "||" operator
// }


// $x = 100;
// if( !($x == 90) ){
//     echo "Hello Asad!";
// }



// $fName = "Asad";
// $lName = "Bin Hasan";
// $fullName = $fName . " " . $lName;
// echo $fullName;


// $myName = "Asad";
// $myName .= " " . "Bin Hasan";
// echo $myName;


// $colors_1 = ["Red", "Green", 333];
// $colors_2 = ["Red", "Green", "333"];

// if($colors_1 == $colors_2){
//     echo "Both Arrays are equal";
// }


// $colors_1 = ["Red", "Green", "Blue"];
// $colors_2 = ["Orange", "Yellow", "Black"];

// if($colors_1 != $colors_2){
//     echo "Arrays are not equal";
// }


// $age = 20;
// $ageCheck = $age >= 18 ? "You are Adult!" : "You are a teen aged";
// echo $ageCheck;


// $ageCheck = Null ?? "2nd expression";
// echo $ageCheck;


// $colors_1 = [
//     "color-1" => "Red", 
//     "color-2" => "Green", 
//     "color-3" => "Blue"
// ];
// $colors_2 = [
//     "color-4" => "Orange", 
//     "color-5" => "Yellow", 
//     "color-6" => "Black"
// ];

// $allColors = $colors_1 + $colors_2;
// // var_dump($allColors);
// echo $allColors["color-1"]; // Red
// echo $allColors["color-5"]; // Yellow










