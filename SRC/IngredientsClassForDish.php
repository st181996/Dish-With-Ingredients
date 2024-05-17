<?php

class Ingredients
{
    public function __construct(
        private readonly string $ingredientone,
        private readonly string $ingredienttwo,
        private readonly string $ingredientthree,
        private readonly string $ingredientfour
    )
    {
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
