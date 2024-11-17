<?php

include "Product.php";

class ProductManager {
    public function addProducts(array $products) : void
    {
        $count = 0;
        foreach($products as $product)
        {
            if(!$product instanceof Product){
                throw new InvalidArgumentException("All Items must be typed Product");
            }
            echo "Product " . ++$count . " is " . $product->getProductName() . "<br>";
        }
    }
}

$product1 = new Product("Laptop");
$product2 = new Product("Monitor");
$productsArray = [$product1, $product2, "text"];
$productManager = new ProductManager();

try {
    $productManager->addProducts($productsArray);
}catch(InvalidArgumentException $e){
    echo "<mark> {$e->getMessage()} </mark>";
}


