<?php

declare(strict_types=1);

namespace App;
    
class MysqlDishloader
{
    public $db_host = 'localhost';
    public $db_user = 'root';
    public $db_password = 'root';
    public $db_db = "Database for Dish";
    private $stmt;
    private $result;
    private $dishes;
    private \mysqli $conn;
    
    public function __construct()
    {
        $conn = new \mysqli(
            $this->db_host,
            $this->db_user,
            $this->db_password,
            $this->db_db
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
        
        $this->conn = $conn;
    }
    
    public function getDataFromTable(): array
    {
        $stmt = $this->conn->prepare("SELECT dishname, dishcolour, dishprice, dishingredients FROM Dish");
        $stmt->execute();
        $result = $stmt->get_result();

        $dishes = [];
        
        while ($row = $result->fetch_assoc()) {            
            $ingredients = $row['dishingredients'];
            $ingredients = explode(', ', $ingredients);
			$ingredients = new Ingredients(...$ingredients);
            
            $dish = new Dish($row['dishname'], $row['dishcolour'], $row['dishprice'], $ingredients);
            $dishes[] = $dish;
            
        }
        return $dishes;
    }  
}


