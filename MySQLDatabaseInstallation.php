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

class Dish {
    public $id;
    public $dishname;
    public $dishcolour;
    public $dishprice;
    public $dishingredients;
    
    public function __construct($id, $dishname, $dishcolour, $dishprice, $dishingredients)
    {
        $this->id = $id;
        $this->dishname = $dishname;
        $this->dishcolour = $dishcolour;
        $this->dishprice = $dishprice;
        $this->dishingredients = $dishingredients;
    }
}

$stmt = $conn->prepare("SELECT id, dishname, dishcolour, dishprice, dishingredients FROM Dish");
$stmt->execute();
$result = $stmt->get_result();

$dishes = [];

while ($row = $result->fetch_assoc()) {
    $dish = new Dish($row['id'], $row['dishname'], $row['dishcolour'], $row['dishprice'], $row['dishingredients']);
    $dishes[] = $dish;
}
var_dump($dishes);

$conn->close();
