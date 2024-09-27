<?php


/**********
$file_name = "web_dictionary.txt";
header('Content-Type: application/txt');
header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
header('Content-Length: ' . filesize($file_name));
readfile($file_name);
**********/




/**********
header('Content-Type: image/webp');
readfile('drone.webp');
**********/


// echo "<pre>";


/**********
$myFile = fopen("web_dictionary.txt", "r") or die("Unable to open the file.");
echo fread($myFile, filesize("web_dictionary.txt"));
fclose($myFile);
**********/




/**********
$myFile = fopen("demo.txt", "r+") or die("Unable to open file");
echo fread($myFile, filesize("demo.txt"));

// Move the pointer back to the beginning of the file
rewind($myFile);

// Overwrite or Modify the file's content
fwrite($myFile, "New Content");
fclose($myFile);
**********/




/**********
$myFile = fopen("demo.txt", "w") or die("Unable to open the file");
fwrite($myFile, "This will overwrite the existing content.");
fclose($myFile);
**********/

/**********
$myFile = fopen("demo.txt", "w") or die("Unable to open the file");
$myFile2 = fopen("web_dictionary.txt", "r");
$get_content_of_myFile2 = fread($myFile2, filesize("web_dictionary.txt"));
fwrite($myFile, $get_content_of_myFile2);
fclose($myFile);
**********/




/**********
$myFile = fopen("demo.txt", "w+") or die("Unable to open");
fwrite($myFile, "New content after overwriting existing file");

rewind($myFile);  // Move back to the start of the file

echo fread($myFile, filesize("demo.txt")); // Read what we just wrote
fclose($myFile);
**********/




/**********
$myFile = fopen("demo.txt", "a") or die("Unable to open");
fwrite($myFile, "This content will be appended.\n");
fclose($myFile);
**********/




/**********
$myFile = fopen("demo.txt", "a+") or die("Unable to open");
fwrite($myFile, "This content will be appended.\n");
rewind($myFile); // Rewind the file pointer to the beginning
echo fread($myFile, filesize("demo.txt")); // Read the file from the start
fclose($myFile);
**********/




/**********
$myFile = fopen("newFile.txt", "x") or die("File already exists or cannot be created");
fwrite($myFile, "New file created, and content written");
fclose($myFile);
**********/




/**********
$myFile = fopen("newFile.txt", "x+") or die("File already exists or cannot be created");
fwrite($myFile, "New file created, and content written");
rewind(($myFile)); // Move the pointer back to the beginning
echo fread($myFile, filesize("newFile.txt")); // Read what we just wrote
fclose($myFile);
**********/




/**********
$myFile = fopen("drone.webp", "rb") or die("Failed to open image");
header("Content-Type: image/webp");
fpassthru($myFile); // Output the binary data

fclose($myFile);
**********/




/**********
$myFile = fopen("web_dictionary.txt", "r") or die("Unable to open file!");
echo fgets($myFile); // First line will be printed
echo fgets($myFile); // Second line will be printed
echo fgets($myFile); // Third line will be printed
fclose($myFile);
**********/

/**********
$myFile = fopen("web_dictionary.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myFile)){
    echo fgets($myFile) . "<br>";
}
**********/




/**********
$myFile = fopen("web_dictionary.txt", "r");
echo fgetc($myFile); // 1st character of 1st line
echo fgetc($myFile); // 2nd character of 1st line
echo fgetc($myFile); // 3rd character of 1st line
fclose($myFile);
**********/

/**********
$myFile = fopen("web_dictionary.txt", "r") or die("Unable to open file!");
$x = 0;
while(!feof($myFile)){
    $x = $x + 1;
    echo $x . " " . fgetc($myFile) . "<br>";
}
fclose($myFile);
**********/




/**********
$myFile = fopen("newFile.txt", "w") or die("Unable to open file!");
fwrite($myFile, "John Doe\n");
fwrite($myFile, "Asad Bin\n");
fclose($myFile);
**********/




/**********
$file_name = "web_dictionary.txt";

echo  is_writable($file_name) ? "The file $file_name exists" : "The file $file_name does not exist";

// if( file_exists($file_name) ){
//     $message = "The file $file_name exists";
// }else{
//     $message = "The file $file_name does not exist";
// }
// echo $message;
**********/




/**********
$myFile = fopen("web_dictionary.txt", "r") or die("Unable to open the file!");
$contents = fread($myFile, filesize("web_dictionary.txt"));
echo nl2br($contents);
fclose($myFile);
**********/




/**********
$html = file_get_contents("https://php.net");
echo $html;
**********/

/**********
$myFile = "web_dictionary.txt";
if(!is_readable($myFile)){
    die("File does not exist or it not readable");
}
echo file_get_contents($myFile);
**********/

/**********
$myFile = "web_dictionary.txt";
if(!is_readable($myFile)){
    die("File does not exist or it not readable");
}
echo file_get_contents($myFile, false, null, 6, 25);
**********/



// echo "<pre>";
/**********
$myFile = file("web_dictionary.txt");

$i = 0;
$line_counts = count($myFile);

while($i < $line_counts){
    echo $myFile[$i] . "<br>";
    $i++;
}

// foreach($myFile as $key){
//     echo $key . "<br>";
// }

**********/




/**********
echo "\n";
$data = "This is appended data.\n";
file_put_contents("demo.txt", $data, FILE_APPEND);
**********/




/**********
$data = "Exclusive write operation.";
file_put_contents("demo.txt", $data, LOCK_EX);
**********/




/**********
$dataArray = ["Line 1", "Line 2", "Line 3"];
file_put_contents("demo.txt", implode("\n", $dataArray));
**********/




/**********
$options = [
    'http' => [
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => 'data=php'
    ]
];
$context = stream_context_create($options);
file_put_contents("php_tutorial.php", file_get_contents("http://php.net", false, $context));

**********/




/**********
////////////////   fputcsv
$data = [
	['GOOG', 'Google Inc.', '800'],
	['AAPL', 'Apple Inc.', '500'],
	['AMZN', 'Amazon.com Inc.', '250'],
	['YHOO', 'Yahoo! Inc.', '250'],
	['FB', 'Facebook, Inc.', '30'],
	['Nokia', 'Mobile \'Phone\'', '200'],
];
$file = fopen("stock.csv", "w");
if ($file === false) {
    die('Error opening the file ' . $file_name);
}

$header = ['Symbol', 'Company', 'Price'];
fputcsv($file, $header);

foreach ($data as $row) {
    fputcsv($file, $row, ",");
}

fclose($file);
**********/




/**********
$file = fopen("stock.csv", "r");

echo "<table border='1' cellspacing='0' cellpadding='5'>
<tr>
<th>Symbol</th>
<th>Company</th>
<th>Price</th>
</tr>";

while( ($data = fgetcsv($file, 0, ",")) !== false ){
    echo "<tr>";
    echo "<td> $data[0] </td>";
    echo "<td> $data[1] </td>";
    echo "<td> $data[2] </td>";
    echo "</tr>";
}
echo "</table>";

fclose($file);
**********/


// echo "<pre>";

/**********

**********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/

