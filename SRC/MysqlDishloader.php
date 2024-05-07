<?php

declare(strict_types=1);

namespace App;
    
class MysqlDishloader
{
    public string $db_host = 'localhost';
    public string $db_user = 'root';
    public string $db_password = 'root';
    public string $db_db = "Database for Dish";
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
    
    /**
     * @return array<int, Dish>
     */
    public function getDataFromTable(): array
    {
        $stmt = $this->conn->prepare("SELECT dishname, dishcolour, dishprice, dishingredients FROM Dish");
        if ($stmt === false) {
            echo 'Error: ';
            exit();  
        }
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result === false) {
            echo 'Error: ';
            exit();  
        }

        $dishes = [];
        
        while ($row = $result->fetch_assoc()) {            
            $ingredients = $row['dishingredients'];
            $ingredients = explode(', ', $ingredients);
			$ingredients = new Ingredients(...$ingredients);
            
            $dish = new Dish($row['dishname'], $row['dishcolour'], (float) $row['dishprice'], $ingredients);
            $dishes[] = $dish;
            
        }
        return $dishes;
    }  
}


