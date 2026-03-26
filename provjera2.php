<!DOCTYPE html>
<html>

<head>
  <title>Provjera 2</title>
  <link rel="stylesheet" href="stil.css">
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
  if (is_string($podatak)) {

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

  <h3>Forma 2 - STRING</h3>

  <form method="POST">

    <input type="text" name="tekst" value="<?= htmlspecialchars($podatak); ?>">

    <label><input type="checkbox" name="opcije[]" value="duljina">Duljina</label>
    <label><input type="checkbox" name="opcije[]" value="rijeci">Broj riječi</label>
    <label><input type="checkbox" name="opcije[]" value="interpunkcija">Interpunkcija</label>
    <label><input type="checkbox" name="opcije[]" value="prva">Prva riječ</label>

    <input type="submit" value="Izračunaj">

  </form>

</body>

</html>