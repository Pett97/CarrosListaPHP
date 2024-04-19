<?php
define('DB_PATH', '../database/cars.txt');

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST' && ($_POST['car']) &&!empty($_POST['car'])) {
  $cars = $_POST['car'];
  file_put_contents(DB_PATH, $cars . PHP_EOL, FILE_APPEND);
}



$cars = file(DB_PATH, FILE_IGNORE_NEW_LINES)

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <title>Lista De Carros</title>
</head>

<body>
  <section>
    <nav>
      <div class="nav-wrapper blue darken-4">
        <a href="" class="brand-logo center">Carros</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="./pages/brand/new.php">Marcas</a></li>
        </ul>
      </div>
    </nav>
  </section>
  <br>

  <div class="container">
  <section>
    <div class="row">
      <form action="/" method="POST" class="col s12">
        <div class="row">
          <div class="input-field col s12 m12 l12">
            <input placeholder="Exemplo: GOL" id="car_name" type="text" class="validate" name="car">
            <label for="car_name">Nome Carro</label>
          </div>
        </div>
        <button class="waves-effect waves-light btn blue" type="submit" >Salvar</button>
      </form>
    </div>
  </section>
  <section>
    <h4>Carros Informados</h4>
    <?php foreach ($cars as $index => $car) : ?>
      <ul class="collection registered cars">
        <li class="collection-item"> <?= $car ?> </li>
      </ul>
    <?php endforeach ?>
  </section>
  </div>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
