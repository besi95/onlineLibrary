<?php
include 'db_connect.php';
$mesazhId = $_GET['mesazhId'];

/**
 * fshi mesazh
 */
$deleteSql = "DELETE from mesazhet WHERE id ='{$mesazhId}'";
$result = $conn->query($deleteSql);
header('Location: ../mesazhet.php');
?>