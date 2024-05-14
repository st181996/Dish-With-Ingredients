<?php
declare(strict_types=1);

namespace App;

class Dish 
{
    private int $dish_id;
    
    private string $colour;
    
    private float $price;
    
    private string $dishname;
    
    private Ingredients $ingredients;
   
    public function __construct(int $dish_id, string $dishname, string $colour, float $price, Ingredients $ingredients)
    {
        $this->dish_id = $dish_id;
        $this->colour = $colour;
        $this->price = $price;
        $this->dishname = $dishname;
        $this->ingredients = $ingredients;
    }
    
    public function setColour(string $colour): void
    {
    	$this->colour = $colour;
    }
    
    public function getDishId(): int
    {
        return $this->dish_id;
    }
    
    public function getColour(): string
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
    
    /*public function isSpicy(): bool
    {
        return in_array(
            "Chilli", 
            $this->ingredients->getIngredients()
        );
    }*/
    
    public function isSpicy(): bool
    {
        $ingredientList = $this->ingredients->getIngredients();
        
        foreach ($ingredientList as $ingredient) {
        
            if (stripos($ingredient, "Chilli") !== false) {
                return true;
            }
        }
        return false;
    }
}


























