<?php 

echo "<pre>";

$url_path = $_SERVER['REQUEST_URI'];

print_r($url_path); echo "<br><br>";

$trimed_url_path = trim($url_path, '/');

echo $trimed_url_path; echo "<br><br>";

$url_breakDown_as_array = explode('/', $trimed_url_path);

print_r($url_breakDown_as_array);

