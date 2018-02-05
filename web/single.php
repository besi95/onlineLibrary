<?php
session_start();
include "src/db_connect.php";
if(!isset($_GET['bookId'])){
    header('Location: index.php');
}
$liberId = $_GET['bookId'];
$userId = $_SESSION['usr_logged_in'];
//merr librin nga databasa
$liberSql = "SELECT * from liber WHERE id='{$liberId}'";
$result = $conn->query($liberSql);
$libri = $result->fetch_assoc();


function gjejAutoret($liberId, $conn)
{
    $autorSql = "SELECT concat(firstname,' ',lastname) AS  emer FROM autor_liber
              INNER JOIN autor ON autor.id = autor_liber.autor_id
              WHERE autor_liber.liber_id = '{$liberId}'";
    $autor = $conn->query($autorSql);

    $autoret = array();

    while ($autori = $autor->fetch_assoc()) {
        $autoret[] = $autori['emer'];
    }
    return $autoret;
}


/**
 * merr komentet nga databasa
 */

$komentSql = "SELECT *, concat(name,' ',lastname) as emri FROM `koment` 
              INNER JOIN user ON koment.user_id = user.id
              WHERE koment.liber_id = '{$liberId}'";
$komentet = $conn->query($komentSql);


?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $libri['title'] ?></title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Quickly Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- js -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
</head>

<body>
<!-- banner-body -->
<div class="banner-body abt">
    <div class="container">
        <!-- header -->
        <div class="header">
            <div class="header-nav">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><span>Adrion</span> Library</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="hvr-bounce-to-bottom active"><a href="index.php">Home</a></li>
                            <li class="hvr-bounce-to-bottom"><a href="about.php">Rreth Nesh</a></li>
                            <li class="hvr-bounce-to-bottom"><a href="portfolio.php">Kategorite</a></li>

                            <li class="hvr-bounce-to-bottom"><a href="contact.php">Kontakt</a></li>
                        </ul>
                        <div class="sign-in">
                            <ul>
                                <?php if (!isset($_SESSION['usr_logged_in'])) { ?>
                                    <li><a href="login.php">Log-In </a>/</li>
                                    <li><a href="register.php">Regjistrohu</a></li>
                                <?php } else { ?>
                                    <li><a href="src/logout.php">Dil</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>

            <!-- search-scripts -->
            <script src="js/classie.js"></script>
            <script src="js/uisearch.js"></script>
            <script>
                new UISearch(document.getElementById('sb-search'));
            </script>
            <!-- //search-scripts -->
        </div>
        <!-- //header -->
        <!-- single -->
        <div class="single-page-artical">
            <div class="artical-content ">
                <div class="row">
                    <div class="col-md-5">
                        <h3><?php echo $libri['title'] ?></h3>
                        <img class="img-responsive single-liber-img"
                             src="../Theme/imazhe/<?php echo $libri['liber_image'] ?>" alt=" "/>
                    </div>
                    <div class="col-md-7 book-page">
                        <?php if($libri['stock'] > 0){?>
                        <div  class="more">
                            <a style="width: 200px" href="checkout.php?bookId=<?php echo $libri['id']?>" class="hvr-bounce-to-bottom sint">BLI Librin </a>
                        </div>
                        <?php }else{?>
                            <span style="color:red">Libri nuk eshte ne stok per momentin.</span>
                        <?php }?>
                        <p><b>Cmimi:</b><?php echo $libri['price'] . ' $' ?></p>
                        <p><b>Pershkrimi:</b><br><?php echo $libri['description'] ?></p>
                        <p><b>Shtepia Botuese:</b><?php echo $libri['publisher'] ?></p>
                    </div>
                </div>
                <div class="artical-links">
                    <ul>
                        <li>
                            <small></small>
                            <span><?php echo $libri['published_on'] ?></span></li>
                        <li><a href="#">
                                <small class="admin"></small>
                                <span><?php $autoretLiber = gjejAutoret($libri['id'], $conn);
                                    foreach ($autoretLiber as $autori) {
                                        echo $autori . '&nbsp; &nbsp; &nbsp;';
                                    }
                                    ?></span></a></li>
                        <li><a href="#">
                                <small class="no"></small>
                                <span><?php echo $komentet->num_rows . ' comments' ?></span></a></li>
                    </ul>
                </div>
                <div class="comment-grid-top">
                    <h3>Komentet</h3>
                <?php if ($komentet->num_rows > 0) { ?>

                        <?php while ($koment = $komentet->fetch_assoc()) { ?>
                            <div class="comments-top-top top-grid-comment">
                                <div class="top-comment-left">
                                    <a href="#"><img class="img-responsive" src="images/user.png" alt=""></a>
                                </div>
                                <div class="top-comment-right">
                                    <ul>
                                        <li><span class="left-at"><a href="#"><?php echo $koment['emri'] ?></a></span>
                                        </li>
                                        <li><span class="right-at"><?php echo $koment['koment_date'] ?></span></li>
                                    </ul>
                                    <p><?php echo $koment['text'] ?></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        <?php } ?>
                <?php } else { ?>
                    <p>Behuni i pari qe komenton.</p>
                <?php } ?>
                </div>
                <?php if (isset($_SESSION['usr_logged_in'])) { ?>
                    <div class="artical-commentbox">
                        <h3>Lini nje Koment</h3>
                        <div class="table-form">
                            <form method="post">
                               <textarea name="mesazhi" required="required">Mesazhi</textarea>
                                <input type="submit" name="submit" value="Komento">
                            </form>
                        </div>
                    </div>
                <?php }else{
                    ?> <p> Ju duhet te logoheni per te lene nje koment.</p>
                    <?php
                } ?>
            </div>
            <!-- single -->
        </div>
    </div>
    <!-- footer -->
    <div class="footer-bottom">
        <div class="container">
            <p>© 2018 All rights reserved | Design by <a href="http://w3layouts.com/">Adrion Library</a></p>
        </div>
    </div>
    <!-- //footer -->
    <!-- for bootstrap working -->
    <script src="js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
</body>
</html>

<?php
if(isset($_POST['submit'])){

    $mesazhi = $_POST['mesazhi'];
    $insertQuery = "INSERT INTO `koment` (`text`, `is_approved`, `user_id`, `liber_id`) 
                  VALUES ('{$mesazhi}', '0', '{$userId}', '{$liberId}');";
    $result = $conn->query($insertQuery);
    header('Location: single.php');

}
?>