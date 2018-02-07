<?php
include 'db_connect.php';
$kategoriId = $_GET['categoryId'];

$deleteSql = "DELETE FROM categories WHERE id ='{$kategoriId}'";
$result = $conn->query($deleteSql);
header('Location: ../kategori.php');
?>