<?php

namespace Tests\Unit\Controllers;

//require "/var/www/core/constants/general.php";

use App\Controllers\BrandsController;
use App\Models\Brand;
use PHPUnit\Framework\TestCase;

class BrandControllerTest extends TestCase
{
    public function test_list_all_brands():void
    {
        $brands[] = new Brand(name: "Marca Teste1");
        $brands[] = new Brand(name: "Marca Teste2");

        foreach ($brands as $brand) {
            $brand->save();
        }

        $controller = new BrandsController();
        ob_start();
        $controller->index();
        $response = ob_get_contents();
        ob_end_clean();

        foreach ($brands as $brand) {
            $this->assertMatchesRegularExpression("/{$brand->getName()}/", $response);
        }
    }
}
