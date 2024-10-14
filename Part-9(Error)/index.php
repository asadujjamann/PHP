<?php 

// echo "<pre>";

/**********

**********/

/////////////////// Throwing an Exception
/**********
function divide($dividend, $divisor){
    if($divisor == 0){
        throw new Exception("Division by Zero");
    }
    return $dividend / $divisor;
}
echo divide(5, 0);
**********/



////////////////// The try...catch Statement
/**********
function divide($dividend, $divisor){
    if($divisor == 0){
        throw new Exception("Division by zero");
    }
    return $dividend / $divisor;
}

try{
    echo divide(5, 0);
} catch(Exception $e){
    echo "Unable to Divide.";
    echo "<br>";
    echo $e;
}
**********/



/////////////////// The try...catch...finally Statement
//// Show a message when an exception is thrown and then indicate that the process has ended:

/**********
function divide($dividend, $divisor){
    if($divisor == 0){
        throw new Exception("Division by Zero");
    }
    return $dividend / $divisor;
}
try{
    echo divide(5, 0);
}catch(Exception $e){
    echo "<p>Unable to Divide. </p>";
}finally{
    echo "<p>Process complete. </p>";
}
**********/

//// Output a string even if an exception was not caught:
/**********
function divide($dividend, $divisor){
    if($divisor == 0){
        throw new Exception("Division by Zero");
    }
    return $dividend / $divisor;
}
try{
    echo divide(5, 0);
}finally{
    echo "<p>Process complete. </p>";
}
**********/



/**********
//// The Exception Object
function divide($dividend, $divisor){
    if($divisor == 0){
        throw new Exception("Division by Zero", 1);
    }
    return $dividend / $divisor;
}
try{
    echo divide(5, 0);
}catch(Exception $e){
    echo $e->getMessage() . "<br>"; // Division by Zero
    echo $e->getCode() . "<br>"; // 1
    echo $e->getPrevious() . "<br>"; // 
    echo $e->getFile() . "<br>"; // /Applications/MAMP/htdocs/learn_php/Part-9(Error)/index.php
    echo $e->getLine() . "<br><br>"; // 82

    echo "Exception thrown in {$e->getFile()} on line {$e->getLine()}: [Code {$e->getCode()}] ";
    // Exception thrown in /Applications/MAMP/htdocs/learn_php/Part-9(Error)/index.php on line 82: [Code 1]
}
**********/




/**********
//// debug_backtrace()
function a($txt){
    b("Mijan");
}
function b($txt){
    c("Biplob");
}
function c($txt){
    print_r(debug_backtrace());
    // echo $txt;
}
echo "<pre>";
a("Asad");
echo "</pre>";
**********/


/**********
//// debug_print_backtrace()
function a($txt){
    b("Mijan");
}
function b($txt){
    c("Biplob");
}
function c($txt){
    debug_print_backtrace();
}
echo "<pre>";
a("Asad");
echo "</pre>";
**********/




/**********
echo $test;

echo "<pre>";
print_r(error_get_last());
echo "</pre>";
**********/




/**********
//// error_log() Function
function speak($name):string{
    if(!is_string($name)){
        error_log("Name must be a string at " . __FILE__ . " line: " . __LINE__ . "\n", 3, "/tmp/error.log");
    }
    return "Hello {$name}";
}
echo speak(123);
// phpinfo();
**********/

  


/**********
//// set_error_handler() Function
//// restore_error_handler() Function

// A user-defined error handler function
function myErrorHandler($errNo, $errStr, $errFile, $errLine){
    echo "<b>Custom Error:</b> [$errNo] $errStr <br>";
    echo "Error on line $errLine in $errFile <br>";
}
set_error_handler("myErrorHandler"); // // Set user-defined error handler function

$test = 2;
// Trigger error
if($test > 1){
    trigger_error("A custom error has been triggered");
}
// Custom Error: [1024] A custom error has been triggered
// Error on line 178 in /Applications/MAMP/htdocs/learn_php/Part-9(Error)/index.php

// Restore previous error handler
restore_error_handler();

// Trigger error
if($test > 1){
    trigger_error("A custom error has been triggered");
}
// Notice: A custom error has been triggered in /Applications/MAMP/htdocs/learn_php/Part-9(Error)/index.php on line 186

**********/




/**********
//// set_exception_handler()

// A user-defined exception handler function
function myException($exception){
    echo "<b>Exception: </b>", $exception->getMessage();
}
// Set user-defined exception handler function
set_exception_handler("myException");

// Throw exception
throw new Exception("Uncaught exception occurred!");


// Exception: Uncaught exception occurred!
**********/




/**********
//// restore_exception_handler()

// Two user-defined exception handler functions
function myException1($exception){
    echo "[" . __FUNCTION__ ."]" . $exception->getMessage();
}
function myException2($exception){
    echo "[" . __FUNCTION__ ."]" . $exception->getMessage();
}
set_exception_handler("myException1");
set_exception_handler("myException2");

restore_error_handler();

// Throw exception
throw new Exception(" This triggers the first exception handler...");
**********/




/**********
//// trigger_error()

$username = 13;
if($username > 10){
    trigger_error("Number cannot be larger than 10");
}

// Notice: Number cannot be larger than 10 in /Applications/MAMP/htdocs/learn_php/Part-9(Error)/index.php on line 246
**********/




