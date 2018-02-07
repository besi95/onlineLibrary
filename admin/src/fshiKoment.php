<?php
include 'db_connect.php';
$komentId = $_GET['komentId'];

/**
 * fshi komentin
 */
$deleteSql = "DELETE FROM koment WHERE id ='{$komentId}'";
$result = $conn->query($deleteSql);
header('Location: ../komentet.php');
?>