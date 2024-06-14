<?php

namespace App;

use App\likes;
use PHPUnit\Framework\TestCase;


class likesTest extends TestCase
{
    public function testRedirectWhenMthodIsNotPost(): void
    {
      
        ob_start();
        include "likes.php";
        ob_end_clean();
        header("location: DishWithIngredients.php");

        $headers = headers_list();
        
        $this->assertArrayHasKey("location", $headers);
        $this->assertEquals("DishWithIngredients.php", $headers["location"]);
    	// var_dump(getallheaders());
//         header("location: DishWithIngredients.php");
//             	var_dump(getallheaders());

    }
}

