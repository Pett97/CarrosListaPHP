<?php
define('DB_PATH', '../../../database/brand.txt');

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST' && ($_POST['brand']) && !empty($_POST['brand'])) {
  $brands = $_POST['brand'];
  file_put_contents(DB_PATH, $brands . PHP_EOL, FILE_APPEND);
}



$brands = file(DB_PATH, FILE_IGNORE_NEW_LINES)

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <title>Lista De Marcas</title>
</head>

<body>
  <section>
    <nav>
      <div class="nav-wrapper teal darken-4">
        <a href="" class="brand-logo center">Marcas</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="../../index.php">Carros</a></li>
        </ul>
      </div>
    </nav>
  </section>
  <br>

  <div class="container">
  <section>
    <div class="row">
      <form action="/pages/brand/new.php" method="POST" class="col s12">
        <div class="row">
          <div class="input-field col s12 m12 l12">
            <input placeholder="Exemplo: Fiat" id="brand_name" type="text" class="validate" name="brand">
            <label for="brand_name">Nome da Marca</label>
          </div>
        </div>
        <button class="waves-effect waves-light btn blue" type="submit">Salvar</button>
      </form>
    </div>
  </section>
  <section>
    <h4>Marcas Informadas</h4>
    <?php foreach ($brands as $index => $brand) : ?>
      <ul class="collection registered brands">
        <li class="collection-item"> <?= $brand ?> </li>
      </ul>
    <?php endforeach ?>
  </section>
  </div>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
