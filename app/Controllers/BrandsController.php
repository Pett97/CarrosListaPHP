<?php

namespace App\Controllers;

use App\Models\Brand;
use Core\Http\Request;

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

    public function create(Request $request): void
    {
        $params = $request->getParams();
        $brand = new Brand(name: $params["brand_name"]);

        if ($brand->save()) {
            $this->redirectTo(route("brands.list"));
        } else {
            $title = "Nova Marca";
            $this->render("list_brand", compact("brand", "title"));
        }
    }

    public function show(Request $request): void
    {
        $params = $request->getParams();
        $brand = Brand::findByID($params["id"]);

        if ($brand !== null) {
            $title = $brand->getName();
            $this->render("detail_brand", compact("brand", "title"));
        } else {
            $this->redirectTo(route("brands.list"));
        }
    }

    public function edit(Request $request): void
    {
        $params = $request->getParams();
        $brand = Brand::findByID($params["id"]);

        $title = "Editar {$brand->getName()}";
        $this->render("edit_brand", compact("brand", "title"));
    }

    public function update(Request $request): void
    {
        $params = $request->getParams();

        $brand = Brand::findByID($params["id"]);

        $newNameBrand = $params["newBrandName"];
        $brand->setName($newNameBrand);
        $brand->save();
        $this->redirectTo(route("brands.list"));

        $title = "Editar Marca ";
        $this->render("edit_brand", compact("brand", "title"));
    }

    public function delete(Request $request): void
    {
        $params = $request->getParams();
        $brand = Brand::findByID($params["id"]);
        $brand->destroy();
        $this->redirectTo(route("brands.list"));
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
