<?php

declare(strict_types=1);

namespace App;
    
class Dishcopy
{
    private $stmt;
    private $result;
    private $dishes;
    private string $colour;
    private float $price;
    private string $dishname;
    private Ingredients $ingredients;
    
    public function __construct(string $dishname, string $colour, float $price, Ingredients $ingredients)
    {
        $this->colour = $colour;
        $this->price = $price;
        $this->dishname = $dishname;
        $this->ingredients = $ingredients;
    }
}
