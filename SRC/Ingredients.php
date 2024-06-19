<?php

namespace App;

/**
 * @see \App\IngredientsTest
 */
class Ingredients
{
    /**
     * @var array<int|string, string>
     */
    private readonly array $ingredients;

    public function __construct(string ...$ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return array<int|string, string>
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function getIngredientsCount(): int
    {
        $ingredients = $this->ingredients;
        $numberOfIngredients = count($ingredients);
        return $numberOfIngredients;
    }
}
