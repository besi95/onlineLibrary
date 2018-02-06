<?php
include 'db_connect.php';
$liberId = $_GET['liberId'];
$deleteAutorLiber = "DELETE from autor_liber WHERE liber_id ='{$liberId}'";
$deleteSql = "DELETE from liber WHERE id ='{$liberId}'";
$result1 = $conn->query($deleteAutorLiber);
$result = $conn->query($deleteSql);
header('Location: ../gallery.php');
?>