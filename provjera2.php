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


    <?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

      $tekst = $_POST["tekst"] ?? "";
      $opcije = $_POST["opcije"] ?? [];

      foreach ($opcije as $opcija) {

        if ($opcija == "duljina") {
          echo "<p>Duljina stringa: " . duljina($tekst) . "</p>";
        }

        if ($opcija == "rijeci") {
          echo "<p>Broj riječi: " . brojRijeci($tekst) . "</p>";
        }

        if ($opcija == "interpunkcija") {
          echo "<p>Broj interpunkcijskin znakova: " . brojInterpunkcija($tekst) . "</p>";
        }

        if ($opcija == "prva") {
          echo "<p>Ponavljanje prve riječi:" . prvaRijecPonavljanje($tekst) . "</p>";
        }
      }
    }
  }

  // BROJEVI
  else {

    echo "<h3>Radi se o BROJU</h3>";

    $broj = ceil($podatak);

    echo "<p>Zaokruženi broj: {$broj}</p>";

    setcookie("broj", $broj, time() + 300);

    $file = $storagePath . "/brojevi.json";

    if (!file_exists($file)) {
      file_put_contents($file, json_encode([]));
    }

    $podaci = json_decode(file_get_contents($file), true);
    $podaci[] = $broj;

    file_put_contents($file, json_encode($podaci, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo "<p>Ukupno brojeva: " . count($podaci) . "</p>";

    ?>

    <h3>Forma 2 - BROJ</h3>

    <form method="POST">

      <input type="number" name="broj" value="<?= $broj; ?>">

      <label><input type="radio" name="opcija" value="prost">Je li broj prost ili složen::</label>
      <label><input type="radio" name="opcija" value="faktorijel">Faktorijel:</label>
      <label><input type="radio" name="opcija" value="binarno">Prikaz u binarnom obliku:</label>

      <input type="submit" value="Izračunaj">

    </form>

  <?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

      $broj = $_POST["broj"] ?? 0;
      $opcija = $_POST["opcija"] ?? "";

      if ($opcija == "prost") {
        echo "<p class=\"rezultat\">" . jeProst($broj) . "</p>";
      }

      if ($opcija == "faktorijel") {
        echo "<p class=\"rezultat\">" . faktorijel($broj) . "</p>";
      }

      if ($opcija == "binarno") {
        echo "<p class=\"rezultat\">" . uBinarni($broj) . "</p>";
      }
    }
  }

  $danENG = date("l");
  $mjesecENG = date("F");

  $dani = [
    "Monday" => "Ponedjeljak",
    "Tuesday" => "Utorak",
    "Wednesday" => "Srijeda",
    "Thursday" => "Četvrtak",
    "Friday" => "Petak",
    "Saturday" => "Subota",
    "Sunday" => "Nedjelja"
  ];

  $mjeseci = [
    "January" => "siječanj",
    "February" => "veljača",
    "March" => "ožujak",
    "April" => "travanj",
    "May" => "svibanj",
    "June" => "lipanj",
    "July" => "srpanj",
    "August" => "kolovoz",
    "September" => "rujan",
    "October" => "listopad",
    "November" => "studeni",
    "December" => "prosinac"
  ];

  echo "<hr>";
  echo "Parcijalni ispit: " .
    $dani[$danENG] . ", " .
    date("d") . ". " .
    $mjeseci[$mjesecENG] . " " .
    date("Y") . " u " .
    date("H:i:s") . ".";


  ?>

</body>

</html>