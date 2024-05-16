<?php 

use App\Dish;
use App\DishLikesHandler;
use App\MysqlDishloader;
use BitAndBlack\SentenceConstruction;
use Symfony\Component\Dotenv\Dotenv;

require "vendor/autoload.php";

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
         
    header("location: DishWithIngredients.php");
} 
$dish_id = (int)$_POST["dish_id"];

$jsonObject = new DishLikesHandler();           
           
$jsonObject->updateDishById($dish_id);

header("location: DishWithIngredients.php");
  