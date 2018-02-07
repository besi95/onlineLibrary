<?php
//parametrat e lidhjes me databasen
$servername = "localhost";
$username = "root";
$password = "";
$database = "libraria";

// Fillo lidhjen me databasen
$conn = new mysqli($servername, $username, $password,$database);

// Kontrollo lidhjen me databasen,nese ka error ndalo ekzekutimin
if ($conn->connect_error) {
    die("Lidhja me databasen ka error: " . $conn->connect_error);
}
?>