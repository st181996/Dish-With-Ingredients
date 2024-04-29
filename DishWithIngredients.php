<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Dish;
use App\Ingredients;
use BitAndBlack\SentenceConstruction;

require "vendor/autoload.php";

echo "Today is " . date("Y/m/d") . "<br>";

$ingredientA = new Ingredients("Spaghetti Pasta","Eggs","Pancetta","Parmesan Cheese","Blck Pepper","Olive Oil","Garlic","Parsley for garnish");
$ingredientB = new Ingredients("Chicken Breast","Soy Sauce","Garlic","Ginger","Onion","Sesame Oil","Cornstarch","Chilli","Rice for serving");
$ingredientC = new Ingredients("Fresh Tomatoes","Fresh Mozzarella Cheese","Fresh Basel Leaves","Balsamic Vinegar","Extra Virgin Olive Oil","Salt","Pepper");

$dishes = array(
     new Dish("Spaghetti Carbonara","Deep Red", 7, $ingredientA),
     new Dish("Chicken Stir-Fry","Rich Yellow", 5.2, $ingredientB),
     new Dish("Caprese Salad","Green and White", 6, $ingredientC),
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
                    
                        echo new SentenceConstruction(
                            ", " , 
                            " and " , 
                            $dish->getIngredients()->getIngredients()
                        ); 
                            echo "<br>" . "Is the Dish Spicy :" . ($dish->isSpicy() ? "Yes" : "No");
                              
                        ?>
                        
                    </td>
                </tr>
            <?php 
            }
            ?>
        </table>
    </body>
</html>