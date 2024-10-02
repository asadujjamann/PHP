<?php 
echo '<head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
        <style>
            code {
                white-space: pre-wrap; /* Preserves line breaks and spaces */
                font-family: monospace; /* Optional: for code-like font */
            }
        </style>
    </head>'
?>

<?php

// এই লিসন এ দেখানো হয়েছে:  একটি লিংক পাওয়ার পর সেটাকে কিভাবে ম্যানুপুলেট করে আরেকটা লিংক তৈরী করা যায়, সেই লিংককে encode করা এবং encoded লিংককে decode করা.
// url এ ? দিয়ে নিলে সেটা query parameter.
// url এ / দিয়ে নিলে সেটা path parameter.
// assignment = Code with dary এর মতো একটা ব্লগ সাইট বানানো


// $_SERVER
// $_SERVER['REQUEST_URI']
// $_SERVER['REQUEST_METHOD']
// $_SERVER['QUERY_STRING']
// parse_url()  -- Extract components (including query string) from a URL
// parse_str()  -- Parses a query string into variables or an array
// http_build_query()  -- Builds a URL-encoded query string from an array.
// urlencode()  -- Encode a string to be URL-safe
// urldecode()  -- Decodes a URL-encoded string
// 




echo "<code>";
// var_dump($_SERVER);
// echo $_SERVER['REQUEST_URI'];
// echo $_SERVER['REQUEST_METHOD'];
// echo $_SERVER['QUERY_STRING'];

// $url = "https://www.google.com/search?q=wordpress&oq=wordpress&gs_lcrp=EgZjaHJvbWUqDggAEEUYJxg7GIAEGIoFMg4IABBFGCcYOxiABBiKBTIGCAEQIxgnMgYIAhBFGDwyBggDEEUYQTIGCAQQRRg9MgYIBRBFGDwyBggGEEUYPTIGCAcQRRhB0gEIMTYyMWowajeoAgCwAgA&sourceid=chrome&ie=UTF-8";

// $url = $_SERVER['REQUEST_URI'] . "?" . "name=Asad&age=29&city=Rangpur";
$url = $_SERVER['REQUEST_URI'];
$parsed_url = parse_url($url);

echo $url;
print_r($parsed_url);

parse_str($parsed_url['query'], $query_params);
$query_params['gender'] = 'Male';

print_r($query_params);

$new_query_string = http_build_query($query_params);
echo $new_query_string;

echo "<br><br>";

$encoded_url = urlencode($new_query_string);
echo $encoded_url;

echo "<br><br>";

$decoded_url = urldecode($encoded_url);
echo $decoded_url;


echo "</code>";
?>








