<?php

declare(strict_types=1);

namespace App;

use DateTimeImmutable;
use DateTimeZone;

/**
 * @see \App\DeliveryTimeHandlerTest
 */
class DeliveryTimeHandler
{
    private DateTimeImmutable $day;

    public function __construct(private readonly Dish $dish, DateTimeImmutable $day = null)
    {
        $this->day = $day ?? new DateTimeImmutable('now', new DateTimeZone('Europe/Berlin'));
    }

    public function getClosingTime(): string
    {
        $timeAccordingToIngredients = $this->dish->getDishTime();

        $deliveryTime = $this->day->modify('+' . $timeAccordingToIngredients . ' minutes');

        $deliveryTime = $deliveryTime->format("H:i");

        $day = $this->day;

        $day = $day->format("l");

        $closingTime = strtotime("20:00");
        $closingTime = date("H:i", $closingTime);

        if ($deliveryTime < $closingTime && "Sunday" !== $day) {
        } elseif ($deliveryTime > $closingTime && "Sunday" !== $day) {
            $deliveryTime = "The resturant is closed. Pre-order now and get it by 11:00am in the morning.";
        } elseif ("Sunday" == $day) {
            $deliveryTime = $deliveryTime . "<br>" . "The order can take 30 more minutes due to weekend.";
        }
        return $deliveryTime;
    }
}
