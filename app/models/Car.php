<?php

class Car
{
  const DB_PATH  = '/var/www/database/cars.txt';
  private int $id = 0;
  private string $name = "";

  private array $errors = [];

  public function __construct(string $name)
  {
    $this->id = -1;
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


  private function addErro(string $text)
  {
    $this->errors[] = $text;
  }

  public function save(): bool
  {
    if ($this->isValid()) {
      $this->id = count(file(self::DB_PATH));
      file_put_contents(self::DB_PATH, $this->name . PHP_EOL, FILE_APPEND);
      return true;
    }
    return false;
  }

  public function update(string $newName):bool{
    $cars = self::all();



  }

  private function isValid(): bool
  {

    $this->errors = [];

    if (empty($this->getName())) {
      $this->addErro("Nome do Carro Não Pode ser Vazio");
    }

    return empty($this->errors);
  }

  public static function all(): array
  {
    $cars = file(self::DB_PATH, FILE_IGNORE_NEW_LINES);

    return array_map(function ($carName) {
      return new Car(name: $carName);
    }, array_keys($cars), $cars);
  }

  public static function findByName(string $name): Car|null
  {
    $cars = self::all();
    $name = strtoupper($name);
    foreach ($cars as $car) {
      if ($car->getName() === $name) {
        return $car;
      }
    }
    return null;
  }

  
}
