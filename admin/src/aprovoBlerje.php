<?php
include "db_connect.php";
$blerjeId = $_GET['blerjeId'];

$aprovoSql = "UPDATE `blerje` SET `status` = '1'
              WHERE `blerje`.`id` = '{$blerjeId}';";
$result = $conn->query($aprovoSql);
header('Location: ../blerjet.php');