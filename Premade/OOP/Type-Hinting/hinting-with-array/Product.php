<?php

class Product 
{
    public function __construct(private string $product)
    {
    }
    public function getProductName()
    {
        return $this->product;
    }
}