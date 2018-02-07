<?php
include 'db_connect.php';
$userId = $_GET['userId'];

/**
 * fshi user
 */
$deleteSql = "DELETE FROM user WHERE id ='{$userId}'";
$result = $conn->query($deleteSql);
header('Location: ../users.php');
?>