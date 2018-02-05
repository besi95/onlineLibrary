<?php
include 'db_connect.php';
$komentId = $_GET['komentId'];

$deleteSql = "DELETE FROM koment WHERE id ='{$komentId}'";
$result = $conn->query($deleteSql);
header('Location: ../komentet.phtml');
?>