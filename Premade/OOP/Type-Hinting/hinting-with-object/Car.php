<?php

class Car 
{
    // private string $model;
    public function __construct(private string $model)
    {
        // $this->model = $model;
    }

    public function getModel() : string 
    {
        return $this->model;
    }
}