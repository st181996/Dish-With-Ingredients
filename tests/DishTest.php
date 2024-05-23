<?php

namespace App;

use PHPUnit\Framework\TestCase;

class DishTest extends TestCase
{
    public function testDishColor(): void
    {
        $ingredientA = new Ingredients("Spaghetti Pasta", "Eggs", "Pancetta", "Parmesan Cheese", "Blck Pepper", "Olive Oil", "Garlic", "Parsley for garnish");

        $dish = new Dish(1, "Spaghetti Carbonara", "Deep Red", 7, $ingredientA, 19);

        $this->assertSame(
            "Deep Red",
            $dish->getColour()
        );
    }

    public function testDishName(): void
    {
        $ingredientA = new Ingredients("Spaghetti Pasta", "Eggs", "Pancetta", "Parmesan Cheese", "Blck Pepper", "Olive Oil", "Garlic", "Parsley for garnish");

        $dish = new Dish(1, "Spaghetti Carbonara", "Deep Red", 7, $ingredientA, 19);

        $this->assertSame(
            "Spaghetti Carbonara",
            $dish->getDishName()
        );
    }

    public function testDishPrice(): void
    {
        $ingredientA = new Ingredients("Spaghetti Pasta", "Eggs", "Pancetta", "Parmesan Cheese", "Blck Pepper", "Olive Oil", "Garlic", "Parsley for garnish");

        $dish = new Dish(1, "Spaghetti Carbonara", "Deep Red", 7.0, $ingredientA, 19);

        $this->assertEqualsWithDelta(7.0, $dish->getPrice(), PHP_FLOAT_EPSILON);
    }

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

    public function testDishIsSpicy(): void
    {
        $ingredientA = new Ingredients("Spaghetti Pasta", "Chilli", "Eggs", "Pancetta", "Parmesan Cheese", "Blck Pepper", "Olive Oil", "Garlic", "Parsley for garnish");

        $dish = new Dish(1, "Spaghetti Carbonara", "Deep Red", 7, $ingredientA, 19);

        $this->assertTrue(
            $dish->isSpicy()
        );
    }

    public function testDishIsSpicyFalse(): void
    {
        $ingredientA = new Ingredients("Spaghetti Pasta", "Eggs", "Pancetta", "Parmesan Cheese", "Blck Pepper", "Olive Oil", "Garlic", "Parsley for garnish");

        $dish = new Dish(1, "Spaghetti Carbonara", "Deep Red", 7, $ingredientA, 19);

        $this->assertFalse(
            $dish->isSpicy()
        );
    }

    public function testDishIsSpicyLowerCase(): void
    {
        $ingredientA = new Ingredients("Spaghetti Pasta", "chilli", "Eggs", "Pancetta", "Parmesan Cheese", "Blck Pepper", "Olive Oil", "Garlic", "Parsley for garnish");

        $dish = new Dish(1, "Spaghetti Carbonara", "Deep Red", 7, $ingredientA, 19);

        $this->assertTrue(
            $dish->isSpicy()
        );
    }

    public function testDishIsSpicyWordInWord(): void
    {
        $ingredientA = new Ingredients("Spaghetti Pasta", "Chilli Cheese", "Eggs", "Pancetta", "Parmesan Cheese", "Blck Pepper", "Olive Oil", "Garlic", "Parsley for garnish");

        $dish = new Dish(1, "Spaghetti Carbonara", "Deep Red", 7, $ingredientA, 19);

        $this->assertTrue(
            $dish->isSpicy()
        );
    }
}
