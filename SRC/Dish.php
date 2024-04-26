<?php

namespace App;

class Dish 
{
    private bool $colour;
    
    private float $price;
    
    private string $dishname;
    
    private Ingredients $ingredients;
    
    public function __construct(string $dishname, bool $colour, float $price, Ingredients $ingredients)
    {
        $this->colour = $colour;
        $this->price = $price;
        $this->dishname = $dishname;
        $this->ingredients = $ingredients;
    }
    
    public function setColour(bool $colour): void
    {
    	$this->colour = $colour;
    }
    
    public function getColour(): bool
    {
        return $this->colour;
    }  
      
    public function getPrice(): float
    {
        return $this->price;
    }
    
    public function getDishName(): string
    {
        return $this->dishname;
    }
    
    public function getIngredients(): Ingredients
    {
        return $this->ingredients;
    }
    
}


























