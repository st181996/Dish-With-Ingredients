<?php

namespace App;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class DeliveryTimeHandlerTest extends TestCase
{
    private readonly DateTimeImmutable $day;

    public function testDeliveryTime(): void
    {
        $day = new DateTimeImmutable("15:00");

        $ingredientA = new Ingredients("Spaghetti Pasta", "Chilli Cheese", "Eggs", "Pancetta", "Parmesan Cheese", "Blck Pepper", "Olive Oil", "Garlic", "Parsley for garnish");
        $dish = new Dish(1, "Spaghetti Carbonara", "Deep Red", 7, $ingredientA, 19);

        $deliveryTimeHandler = new DeliveryTimeHandler($dish, $day);

        $testTime = $day->modify("+54 minutes");

        $this->assertEquals(
            $testTime,
            $deliveryTimeHandler->getClosingTime()
        );
    }
}
