<?php

class Dish 
{
    public function __construct(private readonly string $dishname, private bool $colour, private readonly float $price, private Ingredients $ingredients)
    {
    }
    
    public function setColour(bool $colour): void
    {
    	$this->colour = $colour;
    }
    
     public function setIngredients(Ingredients $ingredients): void
    {
    	$this->ingredients = $ingredients;
    }
    
    public function getColour(): bool
    {
        return $this->colour;
    }  
      
    public function getPrice(): float
    {
        return $this->price;
    }
    
    public function getIngredients() : Ingredients
    {
        return $this->ingredients;
    }
    
    public function getDishName(): string
    {
        return $this->dishname;
    }
    
}










