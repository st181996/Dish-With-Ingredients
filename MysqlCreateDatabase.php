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

// code to create a Database

$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();