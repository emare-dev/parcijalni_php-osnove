<?php

function duljina($str) {
  return strlen($str);
}

// Stringovi
function brojRijeci($str) {
  return str_word_count($str);
}

function brojInterpunkcija($str) {
  $interpunkcija = ['.', '!', '?', ',', ';', ':'];
  $brojac = 0;

  for ($i = 0; $i < strlen($str); $i++) {
    if (in_array($str[$i], $interpunkcija)) {
      $brojac++;
    }
  }

  return $brojac;
}

function prvaRijecPonavljanje($str) {
  $rijeci = explode(" ", $str);
  $prva = $rijeci[0] ?? "";
  return str_repeat($prva . " ", count($rijeci));
}

// Brojevi
function jeProst($n) {
    if ($n < 2) return "Nije prost";
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return "Složen";
    }
    return "Prost";
}