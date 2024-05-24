<?php

namespace App\Controllers;

use App\Models\Brand;

class BrandsController
{
    private string $layout = "application";
    public function index(): void
    {
        $brands = Brand::all();
        $title = "Lista De Marcas";
        if ($this->isJsonRequest()) {
            $this->renderJson('list_brand', compact('brands', 'title'));
        } else {
            $this->render('list_brand', compact('brands', 'title'));
        }
    }

    public function new(): void
    {
        $title = "Nova Marca";
        $brand = new Brand();
        $this->render("new_brand", compact("brand", "title"));
        $view = "/var/www/app/views/brands/.phtml";
    }

    public function create(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];

        if ($method !== "POST") {
            $this->redirectTo("/pages/brand/list_brand.php");
        }

        $brandName = trim($_POST["brand_name"]);
        $brandName = strtoupper($brandName);
        $brand = new Brand(name: $brandName);

        if ($brand->save()) {
            $this->redirectTo("/pages/brand/list_brand.php");
        } else {
            $title = "Nova Marca";
            $this->render("list_brand", compact("brand", "title"));
        }
    }

    public function edit(): void
    {
        $brandID = intval($_GET["brand_id"]);
        $brand = Brand::findByID($brandID);

        $title = "Editar {$brand->getName()}";
        $this->render("edit_brand", compact("brand", "title"));
    }


    public function show(): void
    {
        $brandID = $_GET["brand_id"];
        $brandID = (intval($brandID));
        $brand = Brand::findByID($brandID);

        if ($brand !== null) {
            $title = $brand->getName();
            $this->render("detail_brand", compact("brand", "title"));
        } else {
            $this->redirectTo("/pages/list_brand.php");
        }
    }

    public function update(): void
    {
        $method = $_REQUEST['_method'] ?? $_SERVER["REQUEST_METHOD"];

        if ($method !== "PUT") {
            $this->redirectTo("/pages/brand/list_brand.php");
        }

        $id = intval($_POST["idBrandForEdit"]);
        $brand = Brand::findByID($id);

        $newNameBrand = trim($_POST["newNameBrand"]);
        if ($brand !== null) {
            $brand->setName($newNameBrand);
            $brand->save();
            $this->redirectTo("/pages/brand/list_brand.php");
        }

        $title = "Editar Marca ";
        $this->render("edit_brand", compact("brand", "title"));
    }

    public function delete(): void
    {
        $method = $_REQUEST['_method'] ?? $_SERVER["REQUEST_METHOD"];

        if ($method !== "DELETE") {
        } else {
            $id = intval($_POST["id_delete"]);
            $brand = Brand::findByID($id);
            $brand->destroy();
            $this->redirectTo("/pages/brand/list_brand.php");
        }
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
        $view = "/var/www/app/views/brands/" . $view . ".phtml";
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
        include "/var/www/app/views/brands/brands.json.php";
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($json);
        return;
    }

    private function isJsonRequest(): bool
    {
        return (isset($_SERVER['HTTP_ACCEPT']) && $_SERVER['HTTP_ACCEPT'] === 'application/json');
    }
}
