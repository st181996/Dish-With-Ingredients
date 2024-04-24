<?php

Classes

Dish Class
class Dish 
{
    private bool $colour;
    
    private float $price;
    
    //private array $ingredient;
    
    private string $dishname;
    
    private Ingredients $ingredientA;
    
    public function __construct(string $dishname, bool $colour, float $price, Ingredients $ingredientA/*array $ingredient*/)
    {
        $this->colour = $colour;
        $this->price = $price;
        $this->dishname = $dishname;
       // $this->ingredient = $ingredient;
        $this->ingredientA = $ingredientA;
    }
    
    public function setColour(bool $colour)
    {
    	$this->colour = $colour;
    }
    
    //  public function setColour(array $ingredient)
//     {
//     	$this->colour = $ingredient;
//     }
    
    public function getColour(): bool
    {
        return $this->colour;
    }  
      
    public function getPrice(): float
    {
        return $this->price;
    }
    
    // public function getIngredient(): array
//     {
//         return $this->ingredient;
//     }
    
    public function getDishName(): string
    {
        return $this->dishname;
    }
    
    public function getIngredientA(): Ingredients
    {
        return $this->ingredientA;
    }
    
}

<?php

Ingredients Class
class Ingredients
{
    private string $ingredientone;
    
    private string $ingredienttwo;
    
    private string $ingredientthree;
    
    private string $ingredientfour;
    
    public function __construct(string $ingredientone, string $ingredienttwo, string $ingredientthree, string $ingredientfour)
    {
        $this->ingredientone = $ingredientone;
        $this->ingredienttwo = $ingredienttwo;
        $this->ingredientthree = $ingredientthree;
        $this->ingredientfour = $ingredientfour;
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


Dot class

class Dish 
{
    private bool $colour;
    
    private float $price;
    
    //private array $ingredients;
    
    private string $dishname;
    
    //public  string $txt;
    
    private Ingredients $ingredients;
    
    public function __construct(string $dishname, bool $colour, float $price, Ingredients $ingredients)
    {
        $this->colour = $colour;
        $this->price = $price;
        $this->dishname = $dishname;
        $this->ingredients = $ingredients;
        //$this->ingredientA = $ingredientA;
    }
    
    public function setColour(bool $colour)
    {
    	$this->colour = $colour;
    }
    
     public function setIngredients(Ingredients $ingredients)
    {
    	$this->colour = $ingredients;
    }
    
    public function getColour(): bool
    {
        return $this->colour;
    }  
      
    public function getPrice(): float
    {
        return $this->price;
    }
    
    public function getIngredients() : Ingredients
    {
        return $this->ingredients;
    }
    
    public function getDishName(): string
    {
        return $this->dishname;
    }
    
    // public function getIngredientA(): Ingredients
//     {
//         return $this->ingredientA;
//     }
    
}

Dot ingredients class

<?php

class Ingredients
{
    private array $ingredients;
    
    public function __construct(string ...$ingredients)
    {
        $this->ingredients = $ingredients;
       
    }
    
    public function getIngredients(): array
    {
        return $this->ingredients;
    } 
    
    
}

example code with dish and ingredients class

?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "Dish.php";
require "ingredientsClass.php";

$ingredientA = new Ingredients("rice","banana","apple","sugar");
						
$dishA = new Dish("dishone","blue", 7, $ingredientA);
$dishA->setColour("true");
// echo $dishA->getColour();
// echo $dishA->colour;


$dishes = array(
   $dishA,
     new Dish("dishtwo","false", 5.2, $ingredientA),
     // new Dish("dishthree","true", 6, array ("rice","banana","apple","sugar")),
//      new Dish("dishthree","false", 8.4, array ("rice","banana","apple","sugar")),
//      new Ingredients("rice","banana","apple","sugar")
);

//echo $dish->getingredient; 
foreach ($dishes as $dish) {
    echo $dish->getDishName() ."<br>" ." colour: " . $dish->getColour() . ", price : " . $dish->getPrice() . $dish->getIngredientA()->getIngredientone() . $dish->getIngredientA()->getIngredienttwo() . $dish->getIngredientA()->getIngredientthree() . $dish->getIngredientA()->getIngredientfour() . "<br>";
    
    var_dump(implode(", ", $ingredientA->getIngredientone()));
    //echo " ingredientone : " . $ingredients->getIngredientone() . "," . " ingredienttwo : " . $ingredients->getIngredienttwo() . "," . " ingredientthree : " . $ingredients->getIngredientthree() . "," . " ingredientfour : " . $ingredients->getIngredientfour() ."<br>";

    
//     foreach ($dish->getIngredient() as $ingredient){
//         echo $ingredient . ",";
//     }
//     
//     echo "<br>";
}

// foreach ($dishes as $ingredients) {
//     echo " ingredientone : " . $ingredients->getIngredientone() . "," . " ingredienttwo : " . $ingredients->getIngredienttwo() . "," . " ingredientthree : " . $ingredients->getIngredientthree() . "," . " ingredientfour : " . $ingredients->getIngredientfour() ."<br>";
// 
// }


Dot method code with dot class and dot ingredients class 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require "dotClass.php";
require "dotIngredientsClass.php";

$ingredientA = new Ingredients("rice","banana","apple","sugar");
						
$dishA = new Dish("dishone","blue", 7, $ingredientA);
$dishA->setColour("true");
// echo $dishA->getColour();
// echo $dishA->colour;


$dishes = array(
   $dishA,
      // new Dish("dishtwo","false", 5.2, $ingredientA),
       new Dish("dishthree","true", 6, $ingredientA),
       new Dish("dishfour","false", 8.4, $ingredientA)
);

//echo $dish->getingredient; 
foreach ($dishes as $dish) {
    echo $dish->getDishName() ."<br>" ." colour: " . $dish->getColour() . ", price : " . $dish->getPrice() . ", ingredients : " . /*$dish->getIngredients()->getIngredients()*/  /*$dish->getIngredients() . */"<br>";
    
    var_dump(implode(", ", $ingredientA->getIngredients()));
    //echo " ingredientone : " . $ingredients->getIngredientone() . "," . " ingredienttwo : " . $ingredients->getIngredienttwo() . "," . " ingredientthree : " . $ingredients->getIngredientthree() . "," . " ingredientfour : " . $ingredients->getIngredientfour() ."<br>";

    
    //  foreach ($dish->getIngredients() as $ingredients){
//          echo $ingredients . ",";
//      }
//     
//      echo "<br>";
}

// foreach ($dishes as $ingredients) {
//     echo " ingredientone : " . $ingredients->getIngredientone() . "," . " ingredienttwo : " . $ingredients->getIngredienttwo() . "," . " ingredientthree : " . $ingredients->getIngredientthree() . "," . " ingredientfour : " . $ingredients->getIngredientfour() ."<br>";
// 
// }


// }

, <#*[bool autoload]#>)