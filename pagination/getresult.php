<?php
require_once("dbcontroller.php");
require_once("pagination.class.php");

/**
 * kodi qe kthen librat me pagination
 */
$db_handle = new DBController();
$perPage = new PerPage();
$katId = $_GET['katId'];

$sql = "SELECT * FROM liber
              WHERE liber.category='{$katId}' ";
$paginationlink = "../pagination/getresult.php?page=";
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage->perpage; 
$faq = $db_handle->runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}
$perpageresult = $perPage->perpage($_GET["rowcount"], $paginationlink);

$output = '';
if($db_handle->numRows($sql) > 0) {
    foreach ($faq as $k => $v) {
        $output .= '<div class="col-md-3 liber-item">
                        <img style="height: 300px;padding-left: 10%" src="../admin/imazhe/' . $faq[$k]["liber_image"] . '" class="img-rounded" /><br>
                        <p style="text-align: justify;"><b><span class="styled-title">' . $faq[$k]["title"] . '</span></b></br>
                            ' . substr($faq[$k]["description"], 0, 200) . ' ...<br>
                            </br>
                            <b>Cmimi: </b>' . $faq[$k]["price"] . '$<br>
                            <b>Shtepia Botuese:</b>' . $faq[$k]["publisher"] . '<br>
                        </p><br><br>
                        <div style="margin:0" class="more">
                            <a href="single.php?bookId=' . $faq[$k]["id"] . '" class="hvr-bounce-to-bottom sint">Shiko Librin </a>
                        </div>
                    </div>';
    }
}else{
 $output .= "<img src='images/shopping-cart-empty-side-view.png'><span class='styled-title'> Nuk u gjet asnje liber ne kete kategori !</span>";
}
if(!empty($perpageresult)) {
$output .= '<div id="pagelink">' . $perpageresult . '</div>';
}
print $output;
?>
