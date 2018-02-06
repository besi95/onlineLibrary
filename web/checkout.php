<?php
session_start();
include 'src/db_connect.php';
$libriId = $_GET['bookId'];

//merr librin nga databasa
$liberSql = "SELECT * from liber WHERE id='{$libriId}'";
$result = $conn->query($liberSql);
$libri = $result->fetch_assoc();

$userId = $_SESSION['user_id'];

/**
 * kryej blerjen
 */
if (isset($_POST['submit'])) {

    $newStock = $libri['stock'] - 1;
    /**
     * shto blerjen e re
     */
    $blerjeSql = "INSERT INTO `blerje` (`user_id`, `liber_id`, `total`,`status`) 
                  VALUES ('{$userId}', '{$libri['id']}', '{$libri['price']}','0');";
    $result = $conn->query($blerjeSql);


    /**
     * ul sasine pasi behet blerja
     */
    $ulStokun = "UPDATE `liber` SET `stock` = '{$newStock}' WHERE `liber`.`id` = '{$libriId}';";
    $runStok = $conn->query($ulStokun);

    if ($libri['stock'] < 1) {
        setcookie('checkout_status', 'Produkti nuk gjendet ne stok!', time() + 3600, '/');
        header('Location: index.php');
    } elseif ($result) {
        setcookie('checkout_status', 'Blerja u krye me sukses.', time() + 3600, '/');
        header('Location: index.php');
    } else {
        setcookie('checkout_status', 'Blerja nuk mund te kryhet. Ju lutem provoni me vone.', time() + 3600, '/');
        header('Location: index.php');
    }

}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
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
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <div class="row" style="margin-top: 6px;">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                            <h1 class="custom-header-kat-checkout">CHECKOUT</h1>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">

                                <div class="row" style="margin-top: 6px;">
                                    <div class="col-xs-2"></div>
                                    <div class="col-xs-4">
                                        <h6 class="product-name"><strong>Emri Librit</strong></h6>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="col-xs-6 text-right">
                                            <h6><strong>Cmimi</strong></h6>
                                        </div>
                                        <div class="col-xs-6">
                                            <h6><strong>Sasia</strong></h6></div>
                                    </div>
                                </div>
                                <hr>


                                <div class="row">
                                    <div class="col-xs-2"><img class="img-responsive"
                                                               src="../admin/imazhe/<?php echo $libri['liber_image'] ?>">
                                    </div>
                                    <div class="col-xs-4">
                                        <h4 class="product-name"><strong><?php echo $libri['title'] ?></strong></h4>
                                        <h4>
                                            <small><?php echo substr($libri['description'], 0, 255) . '...' ?></small>
                                        </h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="col-xs-6 text-right">
                                            <h6><strong><?php echo number_format($libri['price'], 2) ?> $<span
                                                            class="text-muted">x</span></strong></h6>
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="text" class="form-control input-sm" value="1" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row text-center">
                                    <div class="col-xs-9">
                                        <h4 class="text-right">Totali:
                                            <strong><?php echo number_format($libri['price'], 2) ?> $</strong></h4>
                                    </div>
                                    <div class="col-xs-3">
                                        <form method="post">
                                            <button type="submit" name="submit" class="btn btn-info btn-block">
                                                Kryej Blerjen
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>
