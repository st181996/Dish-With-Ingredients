<?php

class Ingredients
{
    /**
     * @var array<int, string>
     */
    private array $ingredients;
    
    public function __construct(string ...$ingredients)
    {
        $this->ingredients = $ingredients;
       
    }
    
    /**
     * @return array<int, string>
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    } 
    
    
}