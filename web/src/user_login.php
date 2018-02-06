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
    $user = $result->fetch_assoc();
    $isApproved = $user['is_approved'];

    if ($result->num_rows < 1) {
        setcookie('usr_login_error','Kredencialet jane te gabuara.',time()+3600,'/');
        header('Location: ../login.php');
    }elseif($isApproved != 1){
        setcookie('usr_login_error','Ju nuk jeni aprovuar akoma nga administratori i librarise.',time()+3600,'/');
        header('Location: ../login.php');
    }else{

        $user= $result->fetch_assoc();
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['usr_logged_in'] = 1;
        $_SESSION['usr_email'] = $user['email'];
        header('Location: ../index.php');
    }


}
?>