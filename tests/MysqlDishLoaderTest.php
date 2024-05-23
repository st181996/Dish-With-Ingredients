<?php

namespace App\Tests;

use App\Dish;
use App\MysqlDishloader;
use mysqli;
use PHPUnit\Framework\TestCase;

class MysqlDishLoaderTest extends TestCase
{
    private mysqli $conn;

    private ?MysqlDishloader $MysqlDishloader;

    protected function setUp(): void
    {
        $_ENV["DB_DB"] = "Test Database for Dish";
        $_ENV["DB_HOST"] = '127.0.0.1';
        $_ENV["DB_USER"] = 'root';
        $_ENV["DB_PASSWORD"] = 'root';

        $conn = new mysqli(
            $_ENV["DB_HOST"],
            $_ENV["DB_USER"],
            $_ENV["DB_PASSWORD"],
            $_ENV["DB_DB"]
        );

        $this->conn = $conn;

        $sql = "INSERT INTO Dish (id, dishname, dishcolour, dishprice, dishingredients)
        VALUES ('1', 'Spaghetti Carbonara', 'Deep Red', '7', 'Spaghetti Pasta, Eggs, Pancetta, Parmesan Cheese, Blck Pepper, Olive Oil, Garlic, Parsley for garnish');";
        $update = $this->conn->query($sql);

        $sql = "INSERT INTO Dish (id, dishname, dishcolour, dishprice, dishingredients)
        VALUES ('2', 'Chicken Stir-Fry', 'Rich Yellow', '5.2', 'Chicken Breast, Soy Sauce, Garlic, Ginger, Onion, Sesame Oil, Cornstarch, Chilli, Rice for serving')";
        $update = $this->conn->query($sql);

        $this->MysqlDishloader = new MysqlDishloader($_ENV["DB_HOST"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"], $_ENV["DB_DB"]);
    }

    public function testgetDataFromTable(): void
    {
        $dishes = $this->MysqlDishloader->getDataFromTable();

        // Code to check method when only one dish is inserted
        // foreach ($dishes as $dish) {
        //             $result = $dish->getDishId();
        //             $this->assertSame(
        //                 1,
        //                 $result
        //              );
        //         }

        $this->assertCount(2, $dishes);
    }

    public function testgetSpicyDishonly(): void
    {
        $dishes = $this->MysqlDishloader->getSpicyDishOnly();

        $this->assertCount(1, $dishes);

        foreach ($dishes as $dish) {
            $this->assertTrue(
                $dish->isSpicy()
            );
        }
    }

    public function testgetdataConnection(): void
    {
        $query = "SELECT id, dishname, dishcolour, dishprice, dishingredients FROM Dish";

        $dishes = $this->MysqlDishloader->getdataConnection($query);

        $this->assertCount(2, $dishes);
    }

    public function testgetDataFromTableWithKeyword(): void
    {
        $dishes = $this->MysqlDishloader->getDataFromTableWithKeyword();

        $this->assertCount(1, $dishes);
    }

    protected function tearDown(): void
    {
        $sql = "TRUNCATE TABLE Dish";
        $update = $this->conn->query($sql);
        $this->conn->close();

        $this->MysqlDishloader = null;
    }
}
