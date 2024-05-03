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

//code to create a table in the Database

$sql = "CREATE TABLE Dish (
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
}

$conn->close();