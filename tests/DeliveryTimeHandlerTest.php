<?php

namespace App;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class DeliveryTimeHandlerTest extends TestCase
{
    private readonly DateTimeImmutable $day;

    public function testDeliveryTime(): void
    {
        $day = new DateTimeImmutable("2024-06-28 19:00");

        $ingredientA = new Ingredients("Spaghetti Pasta", "Chilli Cheese", "Eggs", "Pancetta", "Parmesan Cheese", "Blck Pepper", "Olive Oil", "Garlic", "Parsley for garnish");
        $dish = new Dish(1, "Spaghetti Carbonara", "Deep Red", 7, $ingredientA, 19);

        $deliveryTimeHandler = new DeliveryTimeHandler($dish, $day);

        $testTime = $day->modify("+54 minutes");
        
        $this->assertEquals(
            $testTime,
            $deliveryTimeHandler->getClosingTime()
        );   
    }
    
    public function testDeliveryTimeAfterClosing(): void
    {
        $day = new DateTimeImmutable("2024-06-28 21:00");

        $ingredientA = new Ingredients("Spaghetti Pasta", "Chilli Cheese", "Eggs", "Pancetta", "Parmesan Cheese", "Blck Pepper", "Olive Oil", "Garlic", "Parsley for garnish");
        $dish = new Dish(1, "Spaghetti Carbonara", "Deep Red", 7, $ingredientA, 19);

        $deliveryTimeHandler = new DeliveryTimeHandler($dish, $day);

        $this->assertNull(
            $deliveryTimeHandler->getClosingTime()
        );   
    }
    
    public function testDeliveryTimeOnSunday(): void
    {
        $day = new DateTimeImmutable("2024-06-30 19:00");

        $ingredientA = new Ingredients("Spaghetti Pasta", "Chilli Cheese", "Eggs", "Pancetta", "Parmesan Cheese", "Blck Pepper", "Olive Oil", "Garlic", "Parsley for garnish");
        $dish = new Dish(1, "Spaghetti Carbonara", "Deep Red", 7, $ingredientA, 19);

        $deliveryTimeHandler = new DeliveryTimeHandler($dish, $day);

        $testTime = $day->modify("+54 minutes");
        $testTime = $testTime->modify("+30 minutes"); //30minutes more for weekend.
        
        $this->assertEquals(
            $testTime,
            $deliveryTimeHandler->getClosingTime()
        );   
    }
}
