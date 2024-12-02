<?php
/** @var array $data */
include_once "./InputData/Day5_InputData.php";


// Funzione per controllare se una stringa è "nice"
function is_nice($s) {
    $len = strlen($s);

    // Controlla se esiste una coppia ripetuta senza sovrapposizione
    $has_pair = false;
    for ($i = 0; $i < $len - 1; $i++) {
        $pair = substr($s, $i, 2);
        if (substr_count($s, $pair) > 1) {
            $has_pair = true;
            break;
        }
    }

    // Controlla se c'è una lettera che si ripete con una lettera in mezzo
    $has_repeat_with_gap = false;
    for ($i = 0; $i < $len - 2; $i++) {
        if ($s[$i] == $s[$i + 2]) {
            $has_repeat_with_gap = true;
            break;
        }
    }

    // La stringa è "nice" se soddisfa entrambe le condizioni
    return $has_pair && $has_repeat_with_gap;
}

// Conta le stringhe "nice"
$nice_count = 0;
foreach ($data as $s) {
    if (is_nice($s)) {
        $nice_count++;
    }
}

echo "Numero di stringhe 'nice': $nice_count\n";