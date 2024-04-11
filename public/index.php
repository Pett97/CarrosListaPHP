<?php
define('DB_PATH', '../database/cars.txt');

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
</head>na

<body>
  <nav class="blue darken-3 center">Lista De Carros</nav>
  <section>
    <div class="row">
      <form action="/" method="POST" class="col s12">
        <div class="row">
          <div class="input-field col s12 m12 l12">
            <input placeholder="Exemplo GOL" id="car_name" type="text" class="validate">
            <label for="car_name">Nome Carro</label>
          </div>
        </div>
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
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
