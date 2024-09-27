<?php


///////////////// Insert array data into json file
$person = [
    "Name" => "Asad",
    "Age" => 29,
    "Country" => "Bangladesh",
    "City" => "Rangpur",
    "Gender" => "Male"
];
$person["Region"] = "Nilphamari";

$personJson = json_encode($person);
file_put_contents('person.json', $personJson);


///////////////// Get array data from json file
$json_file = file_get_contents('person.json');
$json_array = json_decode($json_file, true);
$json_array_keys = array_keys($json_array);


///////////////// Print array data using while loop
$i = 0;
$lenght = count($json_array);

echo "<table border='1' cellpadding='10' cellspacing='0'>
<thead><tr><th>Key</th><th>Value</th></tr></thead>
<tbody>";
while ($i < $lenght){
    $key = $json_array_keys[$i];
    $value = $json_array[$key];

    echo "<tr>
            <td>$key</td>
            <td>$value</td>
        </tr>";

    $i++;
}
echo "</tbody></table>";

