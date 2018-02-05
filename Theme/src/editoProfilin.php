<?php
include "db_connect.php";

$emri = $mbiemri = $email = $username = $ditelindja = $password = $confirmPassword = "";
$emri = $_POST['emri'];
$mbiemri = $_POST['mbiemri'];
$email = $_POST['email'];
$ditelindja = $_POST['ditelindja'];
$password = $_POST['password'];
$confirmPassword = $_POST['konfirmo_password'];
$username = $_POST['username'];
$errors = array();
if (isset($_POST['submit'])) {

    if ($password != $confirmPassword || $password == '11111122333') {
        $errors[] = 'Passwordi duhet te jete i njejte me konfirmimin!';
    } else {
        $password = md5($password);
        $editSql = "UPDATE user SET
                    name ='{$emri}',
                    lastname='{$mbiemri}',
                    birthday='{$ditelindja}',
                    password = '{$password}',
                    username = '{$username}'
                    WHERE email='{$email}'";
        $result = $conn->query($editSql);

    }
    if ($result) {
        $errors[] = "Perdoruesi u editua me sukses!";
        setcookie('editim_result', json_encode($errors), time() + 3600, '/');
        header('Location: ../profili.phtml');
    } else {
        $errors[] = "Editimi nuk mund te kryhet!";
        setcookie('editim_result', json_encode($errors), time() + 3600, '/');
        header('Location: ../profili.phtml');
    }
}