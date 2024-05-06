<?php
require "/var/www/app/models/Car.php";

class CarsController
{
    private string $layout = "application";
    public function index()
    {
        $cars = Car::all();
        $title = "Lista De Carros";

        if ($this->isJsonRequest()) {
            $this->renderJson('index', compact('cars', 'title'));
        } else {
            $this->render('index', compact('cars', 'title'));
        }
    }

    public function show()
    {
        $carID = intval($_GET['car_id']);

        $car = Car::findByID($carID);

        $title = "Detalhes {$car->getName()} ";
        $this->render("detail_car", compact("car", "title"));
    }

    public function new()
    {
        $car = new Car();
        $title = "Novo Carro";
        $this->render("new_car", compact("car", "title"));
    }

    public function create()
    {
        $method = $_SERVER["REQUEST_METHOD"];

        if ($method !== "POST") {
            $this->redirectTo("/pages/cars/list_car.php");
        }

        $params = trim($_POST["car"]);
        $car = new Car(name: $params);

        if ($car->save()) {
            $this->redirectTo("/pages/cars/list_car.php");
        } else {
            $title = "Novo Carro";
            $this->render("new_car", compact("car", "title"));
        }
    }

    public function edit()
    {
        $carID = intval($_GET['car_id']);
        $car = Car::findByID($carID);

        $title = "Editar {$car->getName()} ";
        $this->render("edit_car", compact("car", "title"));
    }

    public function update()
    {
        $method = $_REQUEST['_method'] ?? $_SERVER["REQUEST_METHOD"];

        if ($method !== "PUT") {
            $this->redirectTo("/pages/cars/list_car.php");
            exit;
        }

        $id = intval($_POST["idCarForEdit"]);

        $car = Car::findByID($id);

        $newCarName = trim($_POST["newNameCar"]);

        if ($car !== null) {
            $car->setName($newCarName);
            $car->save();
            
        }

        $title = "Editar Nome Carro ";
        $this->render("new_car", compact("edit_car", "title"));
    }

    public function delete()
    {
        $method = $_REQUEST['_method'] ?? $_SERVER["REQUEST_METHOD"];

        if ($method !== "DELETE") {
            exit;
        } else {
            $id = intval($_POST["id_delete"]);
            $car = Car::findByID($id);
            $car->destroy();
        }
    }

    private function redirectTo(string $path)
    {
        header("Location:" . $path);
        exit;
    }

    private function render($view, $data = [])
    {
        extract($data);
        $view = "/var/www/app/views/cars/" . $view . ".phtml";
        require "/var/www/app/views/layouts/" . $this->layout . ".phtml";
    }

    private function renderJSON($view, $data = [])
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
