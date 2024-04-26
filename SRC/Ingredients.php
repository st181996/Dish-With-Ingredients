<?php

namespace App;

class Ingredients
{
    private array $ingredients;
    
    public function __construct(string ...$ingredients)
    {
        $this->ingredients = $ingredients;
       
    }
    
    public function getIngredients(): array
    {
        return $this->ingredients;
    } 
    
}
