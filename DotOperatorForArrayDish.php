<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require "dotClass.php";
require "dotIngredientsClass.php";

$ingredientA = new Ingredients("rice","banana","apple","sugar");
						
$dishA = new Dish("dishone","blue", 7, $ingredientA);
$dishA->setColour("true");

$dishes = array(
       $dishA,
       new Dish("dishtwo","true", 6, $ingredientA),
       new Dish("dishthree","false", 8.4, $ingredientA)
);

foreach ($dishes as $dish) {
    echo $dish->getDishName() ."<br>" ." colour: " . $dish->getColour() . ", price : " . $dish->getPrice() . ", ingredients : " . "<br>";
    
    var_dump(implode(", ", $ingredientA->getIngredients()));
    echo "<br>";
}
