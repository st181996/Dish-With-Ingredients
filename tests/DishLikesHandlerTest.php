<?php

declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

final class DishLikesHandlerTest extends TestCase
{
    private ?DishLikesHandler $dishLikesHandler;

    public function testgetJsonData(): void
    {
        $this->assertCount(
            3,
            $this->dishLikesHandler->getJsonData()
        );
    }

    public function testgetLikesForDish(): void
    {
        $this->assertSame(
            5,
            $this->dishLikesHandler->getLikesForDish(1)
        );
    }

    public function testgetFilePath(): void
    {
        $this->assertSame(
            "DishesTest.json",
            $this->dishLikesHandler->getFilePath()
        );
    }

    public function testupdateDishById(): void
    {
        $storeValeBeforeUpdate = $this->dishLikesHandler->getLikesForDish(1);

        $update = $this->dishLikesHandler->updateDishById(1);

        $storeValueAfterupdate = $this->dishLikesHandler->getLikesForDish(1);

        $this->assertSame($storeValueAfterupdate, $storeValeBeforeUpdate + 1);
    }

    protected function setUp(): void
    {
        $this->dishLikesHandler = new DishLikesHandler();

        $setTestFilePath = $this->dishLikesHandler->setFilePath("DishesTest.json");

        $data = [
            "1" => 5,
            "2" => 8,
            "3" => 1,
        ];

        $jsonData = json_encode($data, JSON_PRETTY_PRINT);

        file_put_contents($this->dishLikesHandler->getFilePath(), $jsonData);
    }

    protected function tearDown(): void
    {
        $this->dishLikesHandler = null;
    }
}
