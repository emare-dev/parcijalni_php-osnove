<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $podatak = $_POST["podatak"] ?? "";

  header("Location: provjera2.php?podatak=" . urlencode($podatak));
  exit;
}
