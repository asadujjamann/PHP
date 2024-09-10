<?php


/*
DRY - Dont Repeat Yourself
*/


/*
Conceptual Class
------------------

https://watercss.kognise.dev/

https://github.com/faisal2410/json_ic

https://xdebug.org/

*/






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






// $a = 5;
// if($a < 10){
//     echo "Smaller";
// }else{
//     echo "Greater";
// }


/**********
$age = 16;
if ($age = 16;) echo "You are under 18";

// or
$age = 16;
if ($age = 16;) $myAge = "You are under 18";
echo $myAge;
**********/


/**********
$age = 16;
if($age < 18){
    echo "You are under 18";
}
**********/


/**********
$x = 13;
if($x > 10){
    echo "x is above 10 ";
    if($x > 20){
        echo "also above 20 ";
    }else{
        echo "but not above 20 ";
    }
}
**********/


/**********
$day = "Friday";
switch ($day) {
    case "Tuesday":
        echo "Today is Tuesday.";
        break;
    case "Wednesday":
        echo "Today is Wednesday.";
        break;
    case "Thursday":
        echo "Today is Thursday.";
        break;
    default:
        echo "It's the weekend";
        break;
}
**********/


/**********
$userRole = "editor";
$loggedIn = true;

switch (true) {
    case ($userRole === "admin" && $loggedIn):
        echo "Welcome, Admin! You have full access to the system.";
        break;
    case ($userRole === "editor" && $loggedIn):
        echo "Welcome, Editor! You can edit and publish content.";
        break;
    case ($userRole === "subscriber" && $loggedIn):
        echo "Welcome, Subscriber! You can view premium content.";
        break;
    case (!$loggedIn):
        echo "Please log in to continue.";
        break;
    default:
        echo "Role not recognized. Contact support.";
        break;
}
**********/


/**********
// (ব্যাংক অ্যাকাউন্ট ব্যালেন্স চেক): ধরা যাক, আপনি চান একটি প্রোগ্রাম যতক্ষণ না আপনার ব্যাংক ব্যালেন্স ১০,০০০ এর বেশি হচ্ছে ততক্ষণ টাকা জমা করতে থাকবে।

$balance = 0;
$deposit = 2000;
while ($balance < 10000) {
    $balance += $deposit;
    echo "Balance is now: $balance <br>";
}
**********/



/**********
// ব্যবহারকারী যতক্ষণ লগইন না করছে, ততক্ষণ বার্তা দেখাবে "Please login!" এবং একটি নির্দিষ্ট সীমার পর চেষ্টা বন্ধ করবে।

$logged_in = false;
$attempts = 0;

while ( !$logged_in && $attempts < 3){
    $attempts++;
    echo "Attempt $attempts: Please login!<br>";
    // For demonstration, we'll assume the user logs in at attempt 3
    if($attempts === 3){
        $logged_in = true;
    }
}

if ($logged_in) {
    echo "<h3>Successfully logged in!</h3>";
} else {
    echo "<h3>Too many attempts. Please try again after 5 minutes.</h3>";
}
**********/




/**********
// ধরা যাক, আপনি লটারির টিকিট যাচাই করছেন এবং একটি নির্দিষ্ট সংখ্যক টিকিট না পাওয়া পর্যন্ত চালিয়ে যাচ্ছেন। তবে প্রথমবার টিকিট চেক করা হবে।

$winning_ticket = 100;
$ticket = 90;
do {
    echo "Checking ticket number: $ticket <br>";
    $ticket++;
}while($ticket != $winning_ticket);

echo "Congrates! Winning ticket number: $ticket";
**********/


/**********
// আপনি ১০ জন ছাত্রের নম্বর নিয়ে কাজ করছেন এবং প্রতিটি ছাত্রের নম্বর ২ দিয়ে গুণ করে প্রিন্ট করতে চান।

$marks = [50, 60, 70, 80, 90, 85];
echo "Marks multiplied by 2: <br>";
for ($i = 0; $i < count($marks); $i++) {
    echo $marks[$i] * 2 . "<br>";
}
**********/


/**********
// স্কুল বা শিক্ষার্থীদের জন্য গুণনীয়ক (নামতা) টেবিল তৈরি করতে চান যা ১ থেকে ৫ পর্যন্ত সংখ্যার জন্য প্রিন্ট হবে।

for ($i = 1; $i <= 3; $i++){
    for ($j = 1; $j <= 10; $j++){
        echo "$i x $j = " . ($i * $j) . "<br>";
    }
    echo "<br>";
}
**********/



/**********
// ধরা যাক, আপনি একটি অনলাইন স্টোরে প্রোডাক্টের তালিকা প্রদর্শন করছেন।
$products = ["Laptop", "Mobile", "Tablet", "Camera"];
echo "<h3>Available Products: </h3>";
foreach ($products as $product) {
    echo $product . "<br>";
}
**********/



/**********
$i = 1;
while($i < 6){
    if($i == 4) break;
    echo $i . "<br>";
    $i++;
}
**********/
/**********
১. প্রথমে $i < 6 কিনা চেক করবে
২. true হলে echo $i করে দিবে, false হলে loop থেকে বের হয়ে যাবে
৩. তারপর কন্ডিশন $i == 4 কিনা চেক করবে, যদি $i == 4 হয় তাহলে loop টি  তখনই শেষ হয়ে যাবে এবং loop থেকে বের হয়ে যাবে, যদি $i == 4 না হয় তাহলে পরের ধাপে যাবে
৪. $i++ দিয়ে $i  এর মান 1 বাড়াবে, তারপর আবার ১ নাম্বার থেকে শুরু হবে.
**********/




/**********
for ($i=0; $i < 10; $i++) { 
    if ($i == 4) {
        break;
    }
    echo "The number is: $i <br>";
}
**********/
/*
১. Condition চেক করবে ($i < 10) ->   true হলে loop এর ভিতরে ঢুকবে, false হলে loop থেকে বের হয়ে যাবে
২. কন্ডিশন $i == 4 কিনা চেক করবে, যদি $i == 4 হয় তাহলে loop টি তখনই শেষ হয়ে যাবে এবং loop থেকে বের হয়ে যাবে, যদি $i == 4 না হয় তাহলে পরের ধাপে যাবে
৩. echo $i করবে 
৪. $i++ দিয়ে $i  এর মান 1 বাড়াবে, তারপর আবার ১ নাম্বার থেকে শুরু হবে.
*/



/**********
$i = 1;

do {
  if ($i == 4) break;
  echo "$i <br>";
  $i++;
} while ($i < 6);
**********/
/*
১ম ধাপ: কন্ডিশন $i == 4 কিনা চেক করবে, যদি $i == 4 হয় তাহলে loop টি তখনই শেষ হয়ে যাবে এবং loop থেকে বের হয়ে যাবে, যদি $i == 4 না হয় তাহলে পরের ধাপে যাবে
২য় ধাপ: echo $i করবে
৩য় ধাপ: $i++ দিয়ে $i  এর মান 1 বাড়াবে, তারপর আবার ১ নাম্বার থেকে শুরু হবে.
৪থ ধাপ: Condition চেক করবে ($i < 6) ->   true হলে loop এর ভিতরে ঢুকবে, false হলে loop থেকে বের হয়ে যাবে
*/




/**********
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $color) {
  if ($color == "blue") break;
  echo "$color <br>";
}
**********/
/*
১ম ধাপ: Condition চেক করবে ($color == "blue") কিনা। true হলে পরের ধাপে যাবে, false হলে loop থেকে বের হয়ে যাবে
২য় ধাপ: echo "$color" করবে
*/



/**********
// Continue in for Loop
for ($x = 0; $x < 6; $x++) {
    if ($x == 4) {
      continue;
    }
    echo "The number is: $x <br>";
}
**********/




/**********
$x = 0;
 
while($x < 6) {
  $x++;
  if ($x == 4) {
    continue;
  }
  echo "The number is: $x <br>";
} 
**********/




/**********
$i = 0;

do {
  $i++;
  if ($i == 3) continue;
  echo "$i <br>";
} while ($i < 6);
**********/




/**********
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
  if ($x == "blue") continue;
  echo "$x <br>";
}
**********/

