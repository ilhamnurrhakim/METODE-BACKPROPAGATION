<?php

function normalisasi($val, $min, $max){

    $hasil = ((0.8 * ($val - $min)) / ($max - $min)) + 0.1;

    return round($hasil, 4);
    // return $hasil;
}

function denormalisasi($val, $min, $max){
    $hasil = ((($max - $min) * ($val - 0.1)) / 0.8) + $min;

    return round($hasil, 0);
}

/* ------------------------- Proses Forward --------------------------*/

function forward($bias, $x1, $x2, $x3, $x4, $z1, $z2, $z3, $z4){
    $hasil = $bias + ($x1 * $z1) + ($x2 * $z2) + ($x3 * $z3) + ($x4 * $z4);

    return round($hasil, 9);
}

function forward_y($bias, $z1, $z2, $z3, $z4, $z5, $z6, $z7, $z8, $z9, $z10,
    $w1, $w2, $w3, $w4, $w5, $w6, $w7, $w8, $w9, $w10){
    $hasil = $bias + ($z1 * $w1) + ($z2 * $w2) + ($z3 * $w3) + ($z4 * $w4) + ($z5 * $w5) +
        ($z6 * $w6) + ($z7 * $w7) + ($z8 * $w8) + ($z9 * $w9) + ($z10 * $w10);

    return round($hasil, 9);
}

/* -------------------------------------------------------------------*/


/* ------------------------ Proses Aktivasi --------------------------*/

function aktivasi($val){
    $hasil = 1 / (1 + exp(-$val));

    return round($hasil, 9);
}
/* -------------------------------------------------------------------*/