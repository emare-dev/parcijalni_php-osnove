<!DOCTYPE html>
<html>

<head>
  <title>Provjera 2</title>
</head>

<body>

  <?php

  session_start();
  include "helpers.php";

  $storagePath = __DIR__ . "/storage";

  if (!is_dir($storagePath)) {
    mkdir($storagePath, 0777, true);
  }

  $podatak = $_GET["podatak"] ?? "";

  echo "<h2>Primljeni podatak: {$podatak}</h2>";

  // STRINGOVI
  if (!is_numeric($podatak)) {

    echo "<h3>Ovo je STRING.</h3>";

    $_SESSION["stringovi"][] = $podatak;
    $file = $storagePath . "/tekstovi.json";

    if (!file_exists($file)) {
      file_put_contents($file, json_encode([]));
    }

    $podaci = json_decode(file_get_contents($file), true);
    $podaci[] = $podatak;

    file_put_contents($file, json_encode($podaci, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo "<label>Do sada je obrađeno " . count($podaci) . " stringova</label>";
  }

  ?>

</body>

</html>