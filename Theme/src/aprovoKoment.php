<?php
include 'db_connect.php';
$komentId = $_GET['komentId'];

$deleteSql = "UPDATE koment SET is_approved=1 WHERE id ='{$komentId}'";
$result = $conn->query($deleteSql);
header('Location: ../komentet.phtml');
?>