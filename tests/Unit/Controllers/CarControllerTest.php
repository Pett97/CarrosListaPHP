<?php

namespace Tests\Unit\Controllers;

require "/var/www/core/constants/general.php";

use App\Controllers\CarsController;
use App\Models\Car;
use PHPUnit\Framework\TestCase;

class CarControllerTest extends TestCase
{

    public function test_list_all_cars()
    {
        $cars[] = new Car(name: "Carro teste1");
        $cars[] = new Car(name: "Carro teste2");

        foreach ($cars as $car) {
            $car->save();
        }


        $controller =  new  CarsController();
        ob_start();
        $controller->index();
        $response = ob_get_contents();
        ob_end_clean();

        foreach ($cars as $car) {
            $this->assertMatchesRegularExpression("/{$car->getName()}/", $response);
        }
    }
}
