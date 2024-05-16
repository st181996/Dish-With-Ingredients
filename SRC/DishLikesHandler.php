<?php
declare(strict_types=1);

namespace App;

Class DishLikesHandler
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
        if ($jsonData !== false) {  
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
        foreach ((array) $likesData as $likesID => $currentlikes) {
            if ($likesID == $dishID) {
                $dishlikes = $currentlikes;
                return $dishlikes;
            }
        }
        return 0;
    }
    
    public function getFilePath(): string
    {
        return $this->jsonFilePath;
    }
    
    public function updateDishById(int $dish_id): bool
    {
        $likesData = $this->getjsonData();
        $likesData[$dish_id] = $likesData[$dish_id] + 1;
        $updatedJsonData = json_encode($likesData, JSON_PRETTY_PRINT);
        return false !== file_put_contents($this->getFilePath(), $updatedJsonData);
    }
    
}
