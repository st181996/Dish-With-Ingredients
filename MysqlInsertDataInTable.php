<?php

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = "Database for Dish";
$conn = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
);
	
if ($conn->connect_error) {
    echo 'Error: '.$conn->connect_error;
    exit();
}

echo 'Success: A proper connection to MySQL was made.';
echo '<br>';
echo 'Host information: '.$conn->host_info;
echo '<br>';
echo 'Protocol version: '.$conn->protocol_version;
echo '<br>';

//code to update data in table 
/*$sql = "UPDATE `Dish` SET `dishname` = \'Chicken Stir-Fry\', `dishcolour` = \'Rich Yellow\', `dishingredients` = \'Chicken Breast, Soy Sauce, Garlic, Ginger, Onion, Sesame Oil, Cornstarch, Chilli, Rice for serving\' WHERE `Dish`.`id` = 2;"*/

$sql = "INSERT INTO Dish (dishname, dishcolour, dishprice, dishingredients)
VALUES ('Spaghetti Carbonara','Deep Red', '7','Spaghetti Pasta, Eggs, Pancetta, Parmesan Cheese, Blck Pepper, Olive Oil, Garlic, Parsley for garnish');";
$sql = "INSERT INTO Dish (dishname, dishcolour, dishprice, dishingredients)
VALUES ('Chicken Stir-Fry','Rich Yellow', '5.2','Chicken Breast, Soy Sauce, Garlic, Ginger, Onion, Sesame Oil, Cornstarch, Chilli, Rice for serving');";
$sql = "INSERT INTO Dish (dishname, dishcolour, dishprice, dishingredients)
VALUES ('Caprese Salad','Green and White','6','Fresh Tomatoes, Fresh Mozzarella Cheese, Fresh Basel Leaves, Balsamic Vinegar, Extra Virgin Olive Oil, Salt, Pepper')";

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();