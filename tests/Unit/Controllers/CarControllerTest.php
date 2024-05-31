<?php

namespace Tests\Unit\Controllers;

use App\Models\Car;
use App\Controllers\CarsController;

class CarControllerTest extends ControllerTestCase

{
    public function test_list_all_problems(): void
    {
        $cars[] = new Car(name: 'carro1');
        $cars[] = new Car(name: 'carro2');


        foreach ($cars as $car) {
            $car->save();
        }

        $response = $this->get(action: 'index', controller: "App\Controllers\CarsController");

        foreach ($cars as $car) {
            $this->assertMatchesRegularExpression("/{$car->getName()}/", $response);
        }
    }
}
