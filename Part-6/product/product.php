<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <style>
        code {
            white-space: pre-wrap; /* Preserves line breaks and spaces */
            font-family: monospace; /* Optional: for code-like font */
        }
    </style>
</head>
<body>

<?php
$products = [
    "electronics" => "Electronics Porduct: A cool product.",
    "food" => "Food Porduct: Another cool product.",
    "cloth" => "Cloth Porduct: Yet another cool product.",
];

if(isset($_GET['category'])){
    $product_category = $_GET['category'];
    if(isset($products[$product_category])){
        echo "<h2>Product Details of $product_category: </h2>";
        echo "<p>$products[$product_category]</p>";
    }else{
        echo "<h2>Product Not found</h2>";
    }
}else{
    echo "<h2>No product selected.</h2>";
}


// echo "<br><code>";
// var_dump($_GET);
// echo "</code><br>";

?>

<a href="products.php">
    Go to Product page >>
</a>
    
</body>
</html>