<?php

namespace App;

use PHPUnit\Framework\TestCase;

class DishTest extends TestCase
{

    public function testDishColor(): void
    
    {
    
        $ingredientA = new Ingredients("Spaghetti Pasta","Eggs","Pancetta","Parmesan Cheese","Blck Pepper","Olive Oil","Garlic","Parsley for garnish");

        $dish = new Dish("Spaghetti Carbonara","Deep Red", 7, $ingredientA);
    
        $this->assertEquals("Deep Red", $dish->getColour());
        
    }
     
    public function testDishName(): void
    
    {
    
        $ingredientA = new Ingredients("Spaghetti Pasta","Eggs","Pancetta","Parmesan Cheese","Blck Pepper","Olive Oil","Garlic","Parsley for garnish");

        $dish = new Dish("Spaghetti Carbonara","Deep Red", 7, $ingredientA);
    
        $this->assertEquals("Spaghetti Carbonara", $dish->getDishName());
        
    }
    
    public function testDishPrice(): void
    
    {
    
        $ingredientA = new Ingredients("Spaghetti Pasta","Eggs","Pancetta","Parmesan Cheese","Blck Pepper","Olive Oil","Garlic","Parsley for garnish");

        $dish = new Dish("Spaghetti Carbonara","Deep Red", 7, $ingredientA);
    
        $this->assertEquals(7, $dish->getPrice());
        
    }
    
    public function testDishIngredients(): void
    
    {
    
        $ingredientA = new Ingredients("Spaghetti Pasta","Eggs","Pancetta","Parmesan Cheese","Blck Pepper","Olive Oil","Garlic","Parsley for garnish");

        $dish = new Dish("Spaghetti Carbonara","Deep Red", 7, $ingredientA);
    
        $this->assertContains("Spaghetti Pasta", $dish->getIngredients()->getIngredients());
        $this->assertContains("Eggs", $dish->getIngredients()->getIngredients());
        $this->assertContains("Pancetta", $dish->getIngredients()->getIngredients());
        $this->assertContains("Parmesan Cheese", $dish->getIngredients()->getIngredients());
        $this->assertContains("Blck Pepper", $dish->getIngredients()->getIngredients());
        $this->assertContains("Olive Oil", $dish->getIngredients()->getIngredients());
        $this->assertContains("Garlic", $dish->getIngredients()->getIngredients());
        $this->assertContains("Parsley for garnish", $dish->getIngredients()->getIngredients());
    }
}

























