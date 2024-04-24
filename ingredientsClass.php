<?php

class Ingredients
{
    private string $ingredientone;
    
    private string $ingredienttwo;
    
    private string $ingredientthree;
    
    private string $ingredientfour;
    
    public function __construct(string $ingredientone, string $ingredienttwo, string $ingredientthree, string $ingredientfour)
    {
        $this->ingredientone = $ingredientone;
        $this->ingredienttwo = $ingredienttwo;
        $this->ingredientthree = $ingredientthree;
        $this->ingredientfour = $ingredientfour;
    }
    
    public function getIngredientone(): string
    {
        return $this->ingredientone;
    } 
    
    public function getIngredienttwo(): string
    {
        return $this->ingredienttwo;
    } 
    
    public function getIngredientthree(): string
    {
        return $this->ingredientthree;
    } 
    
    public function getIngredientfour(): string
    {
        return $this->ingredientfour;
    } 
    
}
