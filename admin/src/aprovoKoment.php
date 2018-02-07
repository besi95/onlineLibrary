<?php
include 'db_connect.php';
$komentId = $_GET['komentId'];

/**
 * aprovo komentin
 */
$deleteSql = "UPDATE koment SET is_approved=1 WHERE id ='{$komentId}'";
$result = $conn->query($deleteSql);
header('Location: ../komentet.php');
?>