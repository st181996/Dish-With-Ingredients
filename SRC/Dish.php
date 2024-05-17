<?php

declare(strict_types=1);

namespace App;

/**
 * @see \App\DishTest
 */
class Dish 
{
    public function __construct(
        private readonly int $dish_id,
        private readonly string $dishname,
        private string $colour,
        private readonly float $price,
        private readonly Ingredients $ingredients,
        private readonly mixed $likesData
    )
    {
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

    public function getLikes(): mixed
    {
        return $this->likesData;
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

