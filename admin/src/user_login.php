<?php
include "db_connect.php";

$email = $password = "";
if(isset($_POST['submit'])){
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }else{
        setcookie('usr_login_error','Ju lutem vendosni emailin.');
    }
    if(isset($_POST['password'])){
        $password = md5($_POST['password']);
    }else{
        setcookie('usr_login_error','Ju lutem vendosni passwordin.');
    }

    $query = "SELECT * FROM user WHERE email='{$email}' AND password='{$password}' AND role='0'";
    $result = $conn->query($query);

    if ($result->num_rows < 1) {
        setcookie('usr_login_error','Kredencialet jane te gabuara.');
        var_dump($_COOKIE['usr_login_error']);
        die();
        header('Location: ../web/login.php');
    }else{

        $user= $result->fetch_assoc();
        session_start();
        $_SESSION['usr_logged_in'] = 1;
        $_SESSION['usr_email'] = $user['email'];
        header('Location: ../web/index.php');
    }


}
?>