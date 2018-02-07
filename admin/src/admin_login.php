<?php
include "db_connect.php";

$email = $password = "";
/**
 * merr parametrat e postuara
 */
if(isset($_POST['submit'])){
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }else{
        setcookie('login_error','Ju lutem vendosni emailin.',time()+3600,'/');
    }
    if(isset($_POST['password'])){
        $password = md5($_POST['password']);
    }else{
        setcookie('login_error','Ju lutem vendosni passwordin.',time()+3600,'/');
    }

    $query = "SELECT * FROM user WHERE email='{$email}' AND password='{$password}' AND role='1'";
    $result = $conn->query($query);

    if ($result->num_rows < 1) {
        setcookie('login_error','Kredencialet jane te gabuara.',time()+3600,'/');
        header('Location: ../login.php');
    }else{
        $user= $result->fetch_assoc();
        /**
         * kredencialet e sakta, nis sesionin
         */
        session_start();
        $_SESSION['admin_logged_in'] = 1;
        $_SESSION['admin_email'] = $user['email'];
        $_SESSION['admin_name'] = $user['name'].' '.$user['lastname'];
        header('Location: ../index.php');
    }


}
?>