<?php

include 'db_connect.php';
$shtoSql = "INSERT INTO categories(category_name)VALUES('{$_POST['emer_kategoria']}')";

$result = $conn->query($shtoSql);
header('Location: ../kategori.php');