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




/**********
// Return an anonymous function from a function

function multiplier($x){
    return function ($a) use ($x) {
        return $x * $a;
    };
}

echo multiplier(2)(100); // 200 ($x=2, $a=100)
echo multiplier(3)(100); // 300 ($x=3, $a=100)
**********/





/**********
$list = [10, 20, 30];
// $double_it_fn = function ($element){
// 	return $element * 2;
// };
$double_it_fn = fn($element) => $element * 2;
$result = array_map($double_it_fn, $list);
echo "<pre>";
print_r($result);
**********/

 


/**********
// Return an arrow function from a function

function multiplier($x) {
    return fn($a) => $x * $a;
}

// $multiplier = fn($x) => fn($a) => $x * $a;


echo $multiplier(2)(100);
echo $multiplier(3)(100);
**********/




/**********
$name = "Asad";
function myName() {
		$global_name = $GLOBALS['name'];
    echo "I'm " . $global_name;
}
myName(); // I'm Asad.
**********/




/**********
$name = "Asad";
function myName() {
		global $name;
    echo "I'm " . $name;
}
myName();
**********/





/**********
// you can create global variables inside a function by using the $GLOBALS syntax:

function global_wifi() {
    $GLOBALS["wifi_name"] = "General";
    $GLOBALS["wifi_pass"] = "12345";
}
global_wifi();

echo $GLOBALS["wifi_name"];
echo $GLOBALS["wifi_pass"];
**********/




/**********
function global_wifi() {
    global $wifi_name, $wifi_pass;
    $wifi_name = "General";
    $wifi_pass = "12345";
}
global_wifi();
echo $wifi_name;
echo $wifi_pass;
**********/




// /**********
// echo $_SERVER['PHP_SELF']; // /learn_php/Part-4/index.php
// echo $_SERVER['SERVER_NAME']; // localhost
// echo $_SERVER['HTTP_HOST']; // localhost 
// echo $_SERVER['HTTP_REFERER']; // http://localhost/learn_php/
// echo $_SERVER['HTTP_USER_AGENT']; // Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36
// echo $_SERVER['SCRIPT_NAME']; // /learn_php/Part-4/index.php


// echo $_SERVER['GATEWAY_INTERFACE']; // CGI/1.1
// echo $_SERVER['SERVER_ADDR']; // ::1
// echo $_SERVER['SERVER_SOFTWARE']; // Apache/2.4.54 (Unix) OpenSSL/1.0.2u PHP/8.2.0 mod_wsgi/3.5 Python/2.7.18 mod_fastcgi/mod_fastcgi-SNAP-0910052141 mod_perl/2.0.11 Perl/v5.30.1
// echo $_SERVER['SERVER_PROTOCOL']; // HTTP/1.1
// echo $_SERVER['REQUEST_METHOD']; // GET
// echo $_SERVER['REQUEST_TIME']; // 1726394538
// echo $_SERVER['SERVER_ADMIN']; // you@example.com
// **********/





// /**********

// **********/
?>

<!-- 
<html>
<body>

<form method="post" action="data.php">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

</body>
</html> 
-->







<html>
<body>

<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<?php 
    echo $_SERVER['REQUEST_METHOD'];
?>

</body>
</html>

<?php


// /**********

// **********/








