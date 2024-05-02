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

$sql = "SELECT * FROM Dish";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
        <tr>
            <th>id</th>
            <th>dishname</th>
            <th>dishcolour</th>
            <th>dishprice</th>
            <th>dishingredients</th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["dishname"] . "</td><td>" . $row["dishcolour"] . "</td><td>" . $row["dishprice"] . "</td><td>" . $row["dishingredients"] .  "</td></tr>";
    }
    echo "</table";         
} else {
    echo "0 results";
}

        //code to enter data into the table
        
/*$sql = "INSERT INTO Dish (dishname, dishcolour, dishprice, dishingredients)
VALUES ('Spaghetti Carbonara','Deep Red', '7','Spaghetti Pasta, Eggs, Pancetta, Parmesan Cheese, Blck Pepper, Olive Oil, Garlic, Parsley for garnish');";
$sql = "INSERT INTO Dish (dishname, dishcolour, dishprice, dishingredients)
VALUES ('Chicken Stir-Fry','Rich Yellow', '5.2','Chicken Breast, Soy Sauce, Garlic, Ginger, Onion, Sesame Oil, Cornstarch, Chilli, Rice for serving');";
$sql = "INSERT INTO Dish (dishname, dishcolour, dishprice, dishingredients)
VALUES ('Caprese Salad','Green and White','6','Fresh Tomatoes, Fresh Mozzarella Cheese, Fresh Basel Leaves, Balsamic Vinegar, Extra Virgin Olive Oil, Salt, Pepper')";

if ($conn->multi_query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}*/

         // code to create a Database

/*$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}*/

         //code to create a table in the Database

/*$sql = "CREATE TABLE Dish (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
dishname VARCHAR(30) NOT NULL,
dishcolour VARCHAR(30) NOT NULL,
dishprice INT(6) NOT NULL,
dishingredients VARCHAR(500) NOT NULL
)";

if ($conn->query($sql) == TRUE) {
    echo "Table Dish created successfully";
} else {
    echo "Error ceating table: " . $conn->error;
}*/

$conn->close();
