<?php
include "db_connect.php";

$name = $email = $lastname = $username = $password = $ditelindja = "";
$errors = array();

if (empty($_POST["email"])) {

    $errors[] = "Fusha email eshte required.";
} else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Adresa Email jo e sakte.";
    }
}
if (isset($_POST['password'])) {

    $password = md5($_POST['password']);
} else {
    $errors[] = 'Ju lutem vendosni passwordin!';
}
if (!isset($_POST['konfirmo_password'])) {
    $errors[] = " Ju lutem vedosni konfirmimin e passwordit!";
} else {
    $konfirmoPass = md5($_POST['konfirmo_password']);
    if ($password != $konfirmoPass) {
        $errors[] = 'Konfirmimi passwordit jo i sakte!';
    }
}
if (isset($_POST['emri'])) {
    $emri = $_POST['emri'];
} else {
    $errors[] = 'Ju lutem vendosni emrin!';
}
if (isset($_POST['mbiemri'])) {
    $mbiemri = $_POST['mbiemri'];
} else {
    $errors[] = 'Ju lutem vendosni mbiemrin!';
}

if (isset($_POST['username'])) {
    $username = $_POST['username'];
} else {
    $errors[] = 'Ju lutem vendosni username-n!';
}
if (isset($_POST['ditelindja'])) {
    $ditelindja = $_POST['ditelindja'];
} else {
    $errors[] = 'Ju lutem vendosni ditelindjen!';
}

if (count($errors) > 0) {
    setcookie('registration_error', json_encode($errors), time() + 3600, '/');
    header('Location: ../register.php');
} else {

    $query = "INSERT INTO `user` ( `name`, `lastname`, `username`, `email`, 
                              `password`, `role`, `is_approved`, `birthday`) VALUES
              ('{$emri}','{$mbiemri}','{$username}','{$email}',
              '{$password}','0','0','{$ditelindja}')";
    $result = $conn->query($query);



    if ($result == TRUE ) {
        setcookie('registration_success', 'Perdoruesi u krijua me sukses!', time() + 3600, '/');
        header('Location: ../login.php');
    } else {
        $errors[] = "Regjistrimi nuk mund te kryhet. Ju lutem kontakti administratorin e faqes.";
        setcookie('registration_error', json_encode($errors), time() + 3600, '/');
        header('Location: ../registration.php');
    }


}
?>