<?php
class Brand
{
  const DB_PATH  = '/var/www/database/brand.txt';
  private int $id  = 0;
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
      $this->id = count(file(self::DB_PATH))+1;
      file_put_contents(self::DB_PATH, $this->name . PHP_EOL, FILE_APPEND);
      return true;
    }
    return false;
  }

  private function isValid(): bool
  {

    $this->errors = [];

    if (empty($this->getName())) {
      $this->addErro("Nome Marca Não Pode ser Vazio");
    }

    return empty($this->errors);
  }

  public static function all():array{
    $brands = file(self::DB_PATH,FILE_IGNORE_NEW_LINES);

    return array_map(function($brandName){
      return new Brand(name:$brandName);
    },array_keys($brands),$brands);
  }

  public static function findByName(string $name):Brand|null{
    $name = strtoupper($name);

    $brands = self::all();

    foreach($brands as $brand){
        if($brand->getName() === $name){
          return $brand;
        }
    }
    return null;
  }
}
