<?php

namespace App;

use PHPUnit\Framework\TestCase;

class IngredientsTest extends TestCase
{
    public function testDishIngredients(): void
    {
        $ingredientA = new Ingredients("Spaghetti Pasta", "Eggs", "Pancetta", "Parmesan Cheese", "Blck Pepper", "Olive Oil", "Garlic", "Parsley for garnish");

        $dish = new Dish(1, "Spaghetti Carbonara", "Deep Red", 7, $ingredientA, 19);

        $this->assertContains(
            "Spaghetti Pasta",
            $dish->getIngredients()->getIngredients()
        );
        $this->assertContains(
            "Eggs",
            $dish->getIngredients()->getIngredients()
        );
        $this->assertContains(
            "Pancetta",
            $dish->getIngredients()->getIngredients()
        );
        $this->assertContains(
            "Parmesan Cheese",
            $dish->getIngredients()->getIngredients()
        );
        $this->assertContains(
            "Blck Pepper",
            $dish->getIngredients()->getIngredients()
        );
        $this->assertContains(
            "Olive Oil",
            $dish->getIngredients()->getIngredients()
        );
        $this->assertContains(
            "Garlic",
            $dish->getIngredients()->getIngredients()
        );
        $this->assertContains(
            "Parsley for garnish",
            $dish->getIngredients()->getIngredients()
        );
    }

    public function testgetIngredientsCount(): void
    {
        $ingredientA = new Ingredients("Spaghetti Pasta", "Eggs", "Pancetta", "Parmesan Cheese", "Blck Pepper", "Olive Oil", "Garlic", "Parsley for garnish");
        $this->assertSame(
            8,
            $ingredientA->getIngredientsCount()
        );
    }
}
