<?php

declare(strict_types=1);

namespace App;

/**
 * @see \App\DishLikesHandlerTest
 */
class DishLikesHandler
{
    private string $jsonFilePath;

    public function __construct()
    {
        $this->jsonFilePath = "Dishes.json";
    }

    /**
     * @return array<int, int>
     */
    public function getJsonData(): array
    {
        $jsonData = file_get_contents($this->jsonFilePath);
        $likesData = [];
        if (false !== $jsonData) {
            $likesData = json_decode($jsonData, true);
        }
        if (is_array($likesData) !== true) {
            $likesData = [];
        }
        return $likesData;
    }

    public function getLikesForDish(int $dishID): int
    {
        $likesData = $this->getjsonData();
        foreach ($likesData as $likesID => $currentlikes) {
            if ($likesID == $dishID) {
                return $currentlikes;
            }
        }
        return 0;
    }

    public function getFilePath(): string
    {
        return $this->jsonFilePath;
    }

    public function setFilePath(string $jsonFilePath): void
    {
        $this->jsonFilePath = $jsonFilePath;
    }

    public function updateDishById(int $dish_id): bool
    {
        $likesData = $this->getjsonData();
        $likesData[$dish_id] = $likesData[$dish_id] + 1;
        $updatedJsonData = json_encode($likesData, JSON_PRETTY_PRINT);
        return false !== file_put_contents($this->getFilePath(), $updatedJsonData);
    }
}
