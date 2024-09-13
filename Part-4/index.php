<?php
/*
    Fizz Buzz problem
    Psudo code
    1-100  odd , even
*/

/*
    Anonymus Function
    Variable Function
    Arrow Function

    array_map()

    Note: annonymus function ke invoke korate chaile, hoy seita kono function er vitore rekhe callback hisebe invoke korano jabe / othoba varibale er moddhe rekhe invoke korano jabe.
*/






/**********
function myText(){
    echo "Hello Asad!";
}

myText();
**********/




/**********
function sum_of_numbers($a, $b, $c) {
    return $a + $b + $c;
}
$result_1 = sum_of_numbers(5, 10, 20);
$result_2 = sum_of_numbers(15, 20, 30);
$result_3 = sum_of_numbers(25, 30, 40);

echo "<h3>Result_1 is: $result_1</h3>";
echo "<h3>Result_2 is: $result_2</h3>";
echo "<h3>Result_3 is: $result_3</h3>";
**********/




/**********
function calculate($a, $b, $c) {
    $sum = $a + $b + $c;
    $product = $a * $b * $c;
    $average = ($a + $b + $c) / 3;

    return [$sum, $product, $average];
}

$result = calculate(2, 3, 4);

echo "Sum: " . $result[0] . "<br>";
echo "Product: " . $result[1] . "<br>";
echo "Average: " . $result[2] . "<br>";
**********/




/**********
function calculate_area($length, $width = 10) {
    return $length * $width;
}

echo "Area 1: " . calculate_area(5) . "<br>";
echo "Area 2: " . calculate_area(5, 7) . "<br>";
**********/




/**********
function add_five (& $value) {
    $value += 5;
}

$num = 2;
add_five($num);
echo $num;
**********/




/**********
function sum_my_numbers(...$x) {
    $n = 0;
    $len = count($x);
    for ($i=0; $i < $len; $i++) { 
        $n += $x[$i];
    }
    return $n;
}

$result = sum_my_numbers(5, 2, 6, 2, 7, 7);
echo $result;
**********/




/**********
function myFamily($firstName, ...$lastName) {
    $txt = "";
    $len = count($lastName);
    for($i=0; $i < $len; $i++){
        $txt .= "$firstName $lastName[$i] <br>";
    }
    return $txt;
}

$result = myFamily("Md", "Mizan", "Asad", "Biplop");
echo $result;
**********/





// /**********
/*
This test is conducted by Course IC and can be reached on course.ic2023@gmail.com for any inquires related to exam, results etc.
*/
// **********/




/**********
$multiply = function ($x, $y){
    return $x * $y;
};
echo $multiply(15, 20);

echo "<pre>";
var_dump($multiply);
**********/




/**********
$list = [10, 20, 30];
$double_fn = function ($element){
	return $element * 2;
};
$result = array_map($double_fn, $list);
print_r($result);
**********/




/**********
$message = "Hello Bangladesh!";

$say = function () use ($message) {
    echo $message;
};
$say();
**********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




/**********
fopen()
file_get_contents()
fclose()
fwrite()
file_put_contents()

FILE_APPEND
LOCK_EX
rewind()
fseek()
Good things take time
sprintf() *format specifier
csv (comma separated value)


search ---> serialized php


**********/



