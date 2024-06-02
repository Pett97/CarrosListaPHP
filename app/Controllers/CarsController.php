<?php

namespace App\Controllers;

use App\Models\Car;
use Core\Http\Request;

class CarsController
{
    private string $layout = "application";
    public function index(): void
    {
        $cars = Car::all();
        $title = "Lista De Carros";

        if ($this->isJsonRequest()) {
            $this->renderJson('index', compact('cars', 'title'));
        } else {
            $this->render('list_car', compact('cars', 'title'));
        }
    }

    public function new(): void
    {
        $car = new Car();
        $title = "Novo Carro";
        $this->render("new_car", compact("car", "title"));
    }

    public function create(Request $request): void
    {


        $params = $request->getParams();
        $car = new Car(name: $params["car"]);

        if ($car->save()) {
            $this->redirectTo(route("cars"));
        } else {
            $title = "Novo Carro";
            $this->render("new_car", compact("car", "title"));
        }
    }

    public function show(Request $request): void
    {
        $params = $request->getParams();
        $car = Car::findByID($params["id"]);

        $title = "Detalhes {$car->getName()} ";
        $this->render("detail_car", compact("car", "title"));
    }

    public function edit(Request $request): void
    {
        $params = $request->getParams();
        $car = Car::findByID($params["id"]);

        $title = "Editar {$car->getName()} ";
        $this->render("edit_car", compact("car", "title"));
    }

    public function update(Request $request): void
    {
        $params = $request->getParams();

        $car = Car::findByID($params["id"]);

        $newCarName = $params["newNameCar"];

        $car->setName($newCarName);
        $car->save();
        $this->redirectTo(route("cars"));
    }

    public function delete(Request $request): void
    {
        $params = $request->getParams();

        $car = Car::findByID($params["id"]);
        $car->destroy();
        $this->redirectTo(route("cars"));
    }


    private function redirectTo(string $path): void
    {
        header("Location:" . $path);
        exit;
    }
    /**
     * @param array<string, mixed> $data
     */
    private function render(string $view, array $data = []): void
    {
        extract($data);

        $view = "/var/www/app/views/cars/" . $view . ".phtml";
        require "/var/www/app/views/layouts/" . $this->layout . ".phtml";
    }
    /**
     * @param array<string, mixed> $data
     */
    private function renderJSON(string $view, array $data = []): void
    {
        extract($data);
        $view = "/var/www/app/views/brands/" . $view . "json.php";
        $json = [];
        include "/var/www/app/views/brands/cars.json.php";
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($json);
        return;
    }

    private function isJsonRequest(): bool
    {
        return (isset($_SERVER['HTTP_ACCEPT']) && $_SERVER['HTTP_ACCEPT'] === 'application/json');
    }
}
