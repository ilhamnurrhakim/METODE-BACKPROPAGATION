<?php

//mysqli_report(MYSQLI_REPORT_OFF);

// Koneksi
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'db_skripsi';

$conn = mysqli_connect($host, $user, $password);

if (!$conn){
    echo "Tidak dapat terkoneksi dengan server";
    exit();
}

if (!mysqli_select_db($conn, $db_name)){
    echo "Tidak dapat menemukan database";
}

function getRecord($tabel, $field, $where): mysqli_result|bool
{
    global $conn;
    return mysqli_query($conn, "SELECT $field FROM $tabel $where");
}

function insert($tabel, $field, $value){
    global $conn;
    return mysqli_query($conn, "INSERT INTO $tabel $field VALUES $value");
}

function update($tabel, $value, $where){
    global $conn;
    return mysqli_query($conn, "UPDATE $tabel SET $value WHERE $where");
}

function delete($tabel, $where){
    global $conn;
    return mysqli_query($conn, "DELETE FROM $tabel WHERE $where");
}

function fetch($query){
    $data = mysqli_fetch_array($query);
    return $data;
}

function count_rows($query): int|string
{
    $count = mysqli_num_rows($query);
    return $count;
}