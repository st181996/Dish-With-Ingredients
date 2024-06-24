<?php

namespace App;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class DeliveryTimeHandlerTest extends TestCase
{
    private readonly DateTimeImmutable $day;

    public function testDeliveryTime(): void
    {
        $day = new DateTimeImmutable("2024-06-24 15:00");

        $ingredientA = new Ingredients("Spaghetti Pasta", "Chilli Cheese", "Eggs", "Pancetta", "Parmesan Cheese", "Blck Pepper", "Olive Oil", "Garlic", "Parsley for garnish");
        $dish = new Dish(1, "Spaghetti Carbonara", "Deep Red", 7, $ingredientA, 19);

        $deliveryTimeHandler = new DeliveryTimeHandler($dish, $day);

        $this->assertSame(
            "15:54",
            $deliveryTimeHandler->getClosingTime()
        );
    }
}
