<?php


$correct_answers = ["Dhaka", "Rajshahi", "Khulna"];
$user_answers = ["Dhaka", "Khulna", "Rajshahi"];

// if($correct_answers == $user_answers){
//     echo "Correct";
// }else{
//     echo "Incorrect";
// }

$result = array_diff($correct_answers, $user_answers);

if($result == null){
    echo "Correct";
}else{
    echo "Incorrect";
}

