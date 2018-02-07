<?php
include "db_connect.php";
$autorEmer = $_POST['emri'];
$autorMbiemer = $_POST['mbiemri'];

$shtoSql = "INSERT INTO `autor`(`firstname`, `lastname`) VALUES ('{$autorEmer}','{$autorMbiemer}')";
$result = $conn->query($shtoSql);
header('Location: ../gallery.php');