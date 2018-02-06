<?php
include 'db_connect.php';
$blerjeId = $_GET['blerjeId'];

$deleteSql = "DELETE FROM blerje WHERE id ='{$blerjeId}'";
$result = $conn->query($deleteSql);
header('Location: ../blerjet.php');
?>