<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "Dish.php";
require "ingredientsClass.php";

$ingredientA = new Ingredients("rice","banana","apple","sugar");
						
$dishA = new Dish("dishone","blue", 7, $ingredientA);
$dishA->setColour("true");

$dishes = array(
   $dishA,
     new Dish("dishtwo","false", 5.2, $ingredientA),
     new Dish("dishthree","true", 6, $ingredientA),
);

 
foreach ($dishes as $dish) {
    echo $dish->getDishName() ."<br>" ." colour: " . $dish->getColour() . ", price : " . $dish->getPrice() . ", " . $dish->getIngredientA()->getIngredientone() . ", " . $dish->getIngredientA()->getIngredienttwo() . ", " . $dish->getIngredientA()->getIngredientthree() . ", " . $dish->getIngredientA()->getIngredientfour() . "<br>";
   
}
