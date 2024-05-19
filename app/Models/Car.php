<?php

namespace App\Models;

use Core\Constants\Constants;

class Car
{
  //const DB_PATH  = '/var/www/database/cars.txt';
    private string $name = "";

    private array $errors = [];

    public function __construct(string $name = "", private int $id = -1)
    {
        $this->name = strtoupper($name);
    }

    public function setName(string $newName): void
    {
        $this->name = strtoupper($newName);
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function setID(int $newID)
    {
        $this->id = $newID;
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function hasErrors(): bool
    {
        $this->isValid();
        if (empty($this->errors)) {
            return false;
        }
        return true;
    }

    public static function all(): array
    {
        $cars = file(self::DB_PATH(), FILE_IGNORE_NEW_LINES);
        return array_map(fn ($lineNumber, $carName) => new Car(id: $lineNumber, name: $carName), array_keys($cars), $cars);
    }

    public static function findByID(int $id): Car|null
    {
        $cars = self::all();

        foreach ($cars as $car) {
            if ($car->getID() === $id) {
                return $car;
            }
        }
        return null;
    }

    public function save(): bool
    {
        if ($this->isValid()) {
            if ($this->newRecord()) {
                $this->id = file_exists(self::DB_PATH()) ? count(file(self::DB_PATH())) : 0;
                file_put_contents(self::DB_PATH(), $this->name . PHP_EOL, FILE_APPEND);
            } else {
                $cars = file(self::DB_PATH(), FILE_IGNORE_NEW_LINES);
                $cars[$this->id] = $this->name;
                $data = implode(PHP_EOL, $cars);
                file_put_contents(self::DB_PATH(), $data . PHP_EOL);
            }
            return true;
        }
        return false;
    }

    public function newRecord(): bool
    {
        return $this->id == -1;
    }

    public function destroy(): void
    {
        $cars = file(self::DB_PATH(), FILE_IGNORE_NEW_LINES);
        unset($cars[$this->id]);
        $data = implode(PHP_EOL, $cars);
        file_put_contents(self::DB_PATH(), $data . PHP_EOL);
    }

  //private

    private function addErro(string $text)
    {
        $this->errors[] = $text;
    }

    private function isValid(): bool
    {
        $this->errors = [];

        if (empty($this->getName())) {
            $this->addErro("Nome do Carro Não pode ser Vazio");
        }
        return empty($this->errors);
    }

    private static function DB_PATH()
    {
        return Constants::databasePath()->join($_ENV["DB_CAR"]);
    }
}
