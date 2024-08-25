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



$a = 954;     // Integer
$b = 9.54;    // Float
$c = "Asad";  // String
$d = true;    // Boolean
$e = NULL;    // NULL

$a = (string) $a;
$b = (string) $b;
$c = (string) $c;
$d = (string) $d;
$e = (string) $e;

var_dump($a);
var_dump($b);
var_dump($c);
var_dump($d);
var_dump($e);




