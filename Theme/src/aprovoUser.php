<?php
include 'db_connect.php';
$userId = $_GET['userId'];

$deleteSql = "UPDATE user SET is_approved=1 WHERE id ='{$userId}'";
$result = $conn->query($deleteSql);
header('Location: ../users.phtml');
?>