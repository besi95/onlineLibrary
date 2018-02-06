<?php

include "db_connect.php";


$titulli = $shtepiaBotuese = $kategoria = $pershkrimi = $autori = $cmimi = $stoku = "";
$liberId = $_POST['liber_id'];
$oldImage = $_POST['old_image'];
$titulli = $_POST['titulli'];
$shtepiaBotuese = $_POST['shtepia-botuese'];
$kategoria = $_POST['kategoria'];
$pershkrimi = addslashes($_POST['pershkrimi']);
$autoret = $_POST['autori'];
$cmimi = $_POST['cmimi'];
$stoku = $_POST['stoku'];
$image = $_FILES["imazhi"]["name"];;
$errors = array();

if($oldImage != $image){
    $image = $oldImage;
    $uploadStatus = uploadImazhin();
}



$shtoQuery = "UPDATE liber SET
               title='{$titulli}',
               category='{$kategoria}',
               publisher='{$shtepiaBotuese}',
               description='{$pershkrimi}',
               price='{$cmimi}',
               stock='{$stoku}',
               liber_image='{$image}'
               WHERE id='{$liberId}'";



$result = $conn->query($shtoQuery);

editoAutoret($autoret, $liberId, $conn);

if ($result) {
    $errors[] = "Libri u editua me sukses.";
    setcookie('editim_status', json_encode($errors), time() + 3600, '/');
    header('Location: ../editoLiber.php?liberId=' . $liberId);

} else {
    $errors[] = "Editimi i librit nuk mund te kryhet. Provoni perseri.";
    setcookie('editim_status', json_encode($errors), time() + 3600, '/');
    header('Location: ../editoLiber.php?liberId=' . $liberId);

}


function uploadImazhin()
{

    $target_dir = "../imazhe/";
    $target_file = $target_dir . basename($_FILES["imazhi"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

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
 * edito autoret e librit
 */
function editoAutoret($autoret, $liberId, $conn)
{

    $removeSql = "DELETE FROM autor_liber
                  WHERE autor_id NOT IN ( '" . implode("', '", $autoret) . "' )
                  AND liber_id=$liberId";

    $conn->query($removeSql);


    foreach ($autoret as $autorId) {
        $ekziston = kontrolloAutor($autorId, $liberId, $conn);

        if (!$ekziston) {
            $editSql = "INSERT INTO autor_liber (liber_id,autor_id)
                       VALUES ('{$liberId}','$autorId')";
            $conn->query($editSql);
        }
    }
}

/**
 * @param $autorId
 * @param $liberId
 * @param $conn
 * @return bool
 * kontrollo nese autori ekziston
 */
function kontrolloAutor($autorId, $liberId, $conn)
{
    $autorSql = "SELECT * FROM autor_liber
                  WHERE autor_id ='{$autorId}'
                  AND liber_id = '{$liberId}'";

    $autor = $conn->query($autorSql);
    if ($autor->num_rows > 0) {
        return true;
    }
    return false;

}


?>