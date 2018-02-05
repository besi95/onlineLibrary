<?php
include 'db_connect.php';
$userId = $_GET['userId'];

$deleteSql = "DELETE FROM user WHERE id ='{$userId}'";
$result = $conn->query($deleteSql);
header('Location: ../users.phtml');
?>