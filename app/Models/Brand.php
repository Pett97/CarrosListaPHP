<?php

namespace App\Models;

use Core\Constants\Constants;

class Brand
{
  //cons dbPath  = '/var/www/database/brand.txt';

    public string $name = "";

    /**
     * @var array<string, string>
    */
    private array $errors = [];

    public function __construct(string $name = "", private int $id = -1)
    {
        $this->name = trim(strtoupper($name));
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function setName(string $newName): void
    {
        $this->name = trim(strtoupper($newName));
    }

    public function getName(): string
    {
        return $this->name;
    }

    private function addErro(string $text):void
    {
        $this->errors[] = $text;
    }

    public function hasErrors(): bool
    {
        return empty($this->errors);
    }

    public function save(): bool
    {
        if ($this->isValid()) {
            if ($this->newRecord()) {
                $this->id = count(file(self::dbPath()));
                file_put_contents(self::dbPath(), $this->name . PHP_EOL, FILE_APPEND);
            } else {
                $brands = file(self::dbPath(), FILE_IGNORE_NEW_LINES);
                $brands[$this->id] = $this->name;
                $data = implode(PHP_EOL, $brands);
                file_put_contents(self::dbPath(), $data . PHP_EOL);
            }
            return true;
        }
        return false;
    }

    public function newRecord(): bool
    {
        return $this->id == -1;
    }

    private function isValid(): bool
    {

        $this->errors = [];

        if (empty($this->getName())) {
            $this->addErro("Nome Marca Não Pode ser Vazio");
        }

        return empty($this->errors);
    }
    /**
     * @return array<int, Brand>
    */
    public static function all(): array
    {
        $brands = file(self::dbPath(), FILE_IGNORE_NEW_LINES);
        return array_map(fn
        ($lineNumber, $brandName) => new Brand(id: $lineNumber, name: $brandName), array_keys($brands), $brands);
    }


    public static function findByID(int $id): Brand|null
    {
        $brands = self::all();
        foreach ($brands as $brand) {
            if ($brand->getId() === $id) {
                return $brand;
            }
        }
        return null;
    }

    public function destroy(): void
    {
        $brands = file(self::dbPath(), FILE_IGNORE_NEW_LINES);
        unset($brands[$this->id]);
        $data = implode(PHP_EOL, $brands);
        file_put_contents(self::dbPath(), $data . PHP_EOL);
    }

    private static function dbPath():string
    {
        return Constants::databasePath() . $_ENV["DB_BRAND"];
    }
}
