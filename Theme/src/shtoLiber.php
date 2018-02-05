<?php

include "db_connect.php";

$uploadImazhin = uploadImazhin();


$titulli = $shtepiaBotuese = $kategoria = $pershkrimi = $autori = $cmimi = $stoku = "";
$titulli = $_POST['titulli'];
$shtepiaBotuese = $_POST['shtepia-botuese'];
$kategoria = $_POST['kategoria'];
$pershkrimi = $_POST['pershkrimi'];
$autori = $_POST['autori'];
$cmimi = $_POST['cmimi'];
$stoku = $_POST['stoku'];
$image = $_FILES["imazhi"]["name"];
$errors = array();

$shtoQuery = "INSERT INTO `liber` (`title`, `category`, `publisher`,
              `description`, `price`, `liber_image`, `stock`) VALUES 
              ('{$titulli}', '{$kategoria}', '{$shtepiaBotuese}',
               '{$pershkrimi}', '{$cmimi}', '{$image}', '{$stoku}');";

$result = $conn->query($shtoQuery);
$lastIdSql = "SELECT id FROM liber ORDER BY id DESC LIMIT 1";
$lastId = $conn->query($lastIdSql);
$lastId = $lastId->fetch_assoc();
$lastId = $lastId['id'];

editoAutoret($autori, $lastId, $conn);

if ($result) {
    $uploadStatus = uploadImazhin();
    if ($uploadStatus == false) {
        $errors[] = "Imazhi i librit nuk mund te uploadohet.";
    }
    setcookie('shtim_success', 'Libri u shtua me sukses!', time() + 3600, '/');
    header('Location: ../gallery.phtml');
} else {
    $errors[] = "Shtimi i librit nuk mund te kryhet. Provoni perseri.";
    setcookie('shtimi_errors', json_encode($errors), time() + 3600, '/');
    header('Location: ../editoLiber.phtml?liberId=new');

}


function uploadImazhin()
{

    $target_dir = "../imazhe/";
    $target_file = $target_dir . basename($_FILES["imazhi"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
    if (file_exists($target_file)) {
        return false;
    }
// Check file size
    if ($_FILES["imazhi"]["size"] > 500000) {
        return false;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        return false;

    }

    if (move_uploaded_file($_FILES["imazhi"]["tmp_name"], $target_file)) {
        return true;
    } else {
        return false;
    }

}

/**
 * @param $autoret
 * @param $liberId
 * @param $conn
 * shto autoret e librit
 */
function editoAutoret($autoret, $liberId, $conn)
{
    foreach ($autoret as $autorId) {

        $editSql = "INSERT INTO autor_liber (liber_id,autor_id)
                       VALUES ('{$liberId}','$autorId')";
        $conn->query($editSql);
    }
    return true;
}

?>