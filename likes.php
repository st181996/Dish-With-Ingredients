 <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            $dish_id = (int)$_POST["dish_id"];
           
            $jsonFilePath = "Dishes.json";

            $jsonData = file_get_contents($jsonFilePath);
            
            $likesData = json_decode($jsonData, true);
           
            $likesData[$dish_id] = $likesData[$dish_id] + 1;

            $updatedJsonData = json_encode($likesData, JSON_PRETTY_PRINT);

            file_put_contents($jsonFilePath, $updatedJsonData);
            
            header("location: DishWithIngredients.php");
        }
?>
  