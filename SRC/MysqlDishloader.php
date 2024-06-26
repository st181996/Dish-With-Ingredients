<?php

declare(strict_types=1);

namespace App;

use mysqli;

/**
 * @see \App\Tests\MysqlDishloaderTest
 */
class MysqlDishloader
{
    private readonly mysqli $conn;

    public function __construct(string $db_host, string $db_user, string $db_password, string $db_db)
    {
        $conn = new mysqli(
            $db_host,
            $db_user,
            $db_password,
            $db_db
        );
        if ($conn->connect_error) {
            echo 'Error: ' . $conn->connect_error;
            exit();
        }
        // echo 'Success: A proper connection to MySQL was made.';
        //         echo '<br>';
        //         echo 'Host information: ' . $conn->host_info;
        //         echo '<br>';
        //         echo 'Protocol version: ' . $conn->protocol_version;
        //         echo '<br>';

        $this->conn = $conn;
    }

    /**
     * @return array<int, Dish>
     */
    public function getDataFromTable(): array
    {
        $query = "SELECT id, dishname, dishcolour, dishprice, dishingredients FROM Dish";
        return $this->getDataConnection($query);
    }

    /**
     * @return array<int, Dish>
     */
    public function getdataConnection(string $query): array
    {
        $dishes = [];
        $stmt = $this->conn->prepare($query);
        if (false === $stmt) {
            return $dishes;
        }
        $stmt->execute();
        $result = $stmt->get_result();
        if (false === $result) {
            return $dishes;
        }

        $jsonObject = new DishLikesHandler();

        while ($row = $result->fetch_assoc()) {
            $ingredients = $row['dishingredients'];
            $ingredients = explode(', ', $ingredients);
            $ingredientsobject = new Ingredients(...$ingredients);

            $dishID = (int) $row['id'];
            $dishlikes = $jsonObject->getLikesForDish($dishID);

            $dish = new Dish((int) $dishID, $row['dishname'], $row['dishcolour'], (float) $row['dishprice'], $ingredientsobject, $dishlikes);
            $dishes[] = $dish;
        }
        return $dishes;
    }

    /**
     * @return array<int, Dish>
     */
    public function getDataFromTableWithKeyword(): array
    {
        $query = "SELECT id, dishname, dishcolour, dishprice, dishingredients FROM Dish WHERE dishingredients LIKE '%Chilli%'";
        return $this->getDataConnection($query);
    }

    /**
     * @return array<int, Dish>
     */
    public function getSpicyDishOnly(): array
    {
        $dishes = $this->getDataFromTable();
        $dishes = array_filter(
            $dishes,
            fn ($dish) => $dish->isSpicy()
        );

        /* $dishes = $this->getDataFromTable();
        foreach ($dishes as $dish) {
            if ($dish->isSpicy()) {
                $dishes = [];
                $dishes[] = $dish;
            }
        }*/
        return $dishes;
    }
}
