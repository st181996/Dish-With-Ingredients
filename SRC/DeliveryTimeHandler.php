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
    private readonly DateTimeImmutable $day;

    public function __construct(
        private readonly Dish $dish,
        DateTimeImmutable $day = null
    ) {
        $this->day = $day ?? new DateTimeImmutable('now', new DateTimeZone('Europe/Berlin'));
    }

    public function getClosingTime(): ?DateTimeImmutable 
    {
        $timeAccordingToIngredients = $this->dish->getDishTime();

        $deliveryTime = $this->day->modify('+' . $timeAccordingToIngredients . ' minutes');

        $timeToCompare = $deliveryTime->format("H:i");

        $day = $this->day->format("l");

        $closingTime = strtotime("20:00");
        $closingTime = date("H:i", $closingTime);

        if ($timeToCompare > $closingTime) {
            $deliveryTime = null;
        } elseif ("Sunday" == $day) {
            $deliveryTime = $deliveryTime->modify('+30 minutes');
        }
        return $deliveryTime;
    }
}
