<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Dish;
use App\Ingredients;
use BitAndBlack\SentenceConstruction;

require "vendor/autoload.php";

echo "Today is " . date("Y/m/d") . "<br>";

$ingredientA = new Ingredients("rice","banana","apple","sugar");
$ingredientB = new Ingredients("salt","oil","onion","tomato");
$ingredientC = new Ingredients("chilli","cheese","egg","flour");

$dishes = array(
     new Dish("dishone","blue", 7, $ingredientA),
     new Dish("dishtwo","false", 5.2, $ingredientB),
     new Dish("dishthree","true", 6, $ingredientC),
);
?><!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <title> </title>
        <link rel="stylesheet" href="DishWithingrdients.css">
    </head>
    <body>
        <h1>Table For Restaurant</h1>
        <table>
            <tr>
                <th>Dish Name</th>
                <th>Dish Colour</th>
                <th>Dish Price</th>
                <th>Dish Ingredients</th>
            </tr>
            <?php

            foreach ($dishes as $dish) { 
            
            ?>
                <tr>
                    <td><?php echo $dish->getDishName(); ?></td>
                    <td><?php echo $dish->getColour(); ?></td>
                    <!--<td><?php echo $dish->getPrice(); ?></td>-->
                    <td>
                        <div class="price">
                            <?php echo $dish->getPrice(); ?>
                        </div>
                    </td>
                    <td>
                        <?php 
                    
                        $sentence = new SentenceConstruction(
                            " , " , 
                            " and " , 
                            $dish->getIngredients()->getIngredients()
                        ); 
                        
                        echo $sentence; 
                        
                        ?>
                        
                    </td>
                </tr>
            <?php 
            }
            ?>
        </table>
    </body>
</html>