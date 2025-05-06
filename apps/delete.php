<?php

include 'apis.php';

$id = $_POST['id'];
$table = $_POST['tabel'];

$sql = delete($table, "id = '$id'");