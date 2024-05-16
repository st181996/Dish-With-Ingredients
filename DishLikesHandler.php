<?php
declare(strict_types=1);

namespace App;

class DishLikesHandler
{
    private string $jsonFilePath = "Dishes.json";
    
    public function __construct("Dishes.json"): string
    {
        $this->jsonFilePath = $jsonFilePath;
    }
    
    public function getJsonData()
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
    
    public function getLikesForDish($dishID)
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
}
