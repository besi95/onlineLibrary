<?php
session_start();
include "src/db_connect.php";
$katId = $_GET['katID'];
$kategorySql = "SELECT * FROM `categories` WHERE id= '{$katId}'";
$result = $conn->query($kategorySql);
$titleKat = $result->fetch_assoc();
$titleKat = $titleKat['category_name'];

$liberSql = "SELECT * FROM liber
              WHERE liber.category='{$katId}'";
$libra = $conn->query($liberSql);

function gjejAutoret($liberId,$conn){
    $autorSql = "SELECT concat(firstname,' ',lastname) AS  emer FROM autor_liber
              INNER JOIN autor ON autor.id = autor_liber.autor_id
              WHERE autor_liber.liber_id = '{$liberId}'";
    $autor =$conn->query($autorSql);

    $autoret =array();

    while($autori = $autor->fetch_assoc()){
        $autoret[] = $autori['emer'];
    }
    return $autoret;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $titleKat?></title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Quickly Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
</head>

<body>
<!-- banner-body -->
<div class="banner-body page">
    <div class="container">
        <!-- header -->
        <div class="header">
            <div class="header-nav">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><span>Adrion Library</span></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="hvr-bounce-to-bottom"><a href="index.php">Home</a></li>
                            <li class="hvr-bounce-to-bottom"><a href="about.php">Rreth Nesh</a></li>
                            <li class="hvr-bounce-to-bottom active"><a href="portfolio.php">Kategorite</a></li>

                            <li class="hvr-bounce-to-bottom"><a href="contact.php">Kontakt</a></li>
                        </ul>
                        <div class="sign-in">
                            <ul>
                                <?php if(!isset($_SESSION['usr_logged_in'])){?>
                                    <li><a href="login.php">Log-In </a>/</li>
                                    <li><a href="register.php">Regjistrohu</a></li>
                                <?php }else{ ?>
                                    <li><a href="src/logout.php">Dil</a></li>
                                <?php  }?>
                            </ul>
                        </div>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>

            <!-- search-scripts -->
            <script src="js/classie.js"></script>
            <script src="js/uisearch.js"></script>
            <script>
                new UISearch( document.getElementById( 'sb-search' ) );
            </script>
            <!-- //search-scripts -->
        </div>
        <!-- //header -->
        <!-- pages -->
        <div class="pages faqja-librit-wrapper">
            <h1 class="custom-header-kat"><?php echo $titleKat?></h1>
            <div class="banner-bottom">
                <div class="row liber-faqe">
                    <?php while ($liber = $libra->fetch_assoc()){?>
                    <div class="col-md-3 liber-item">
                        <img style=";height: 300px;padding-left: 10%" src="../admin/imazhe/<?php echo $liber['liber_image']?>" alt=" " class="img-responsive" />
                        <br>
                        <p style="text-align: justify;"><b><span class="styled-title"><?php echo $liber['title']?></span></b></br>
                            <?php echo substr($liber['description'],0,200).' ...<br>'?>
                            </br>
                            <b>Cmimi: </b><?php echo $liber['price'].'$'?><br>
                            <b>Shtepia Botuese:</b><?php echo $liber['publisher']?><br>
                            <b>Autor: </b><?php $autoretLiber = gjejAutoret($liber['id'],$conn);
                            foreach($autoretLiber as $autori){
                                echo $autori. ' ';
                            }
                            ?>
                        </p><br><br>
                        <div style="margin:0" class="more">
                            <a href="single.php?bookId=<?php echo $liber['id']?>" class="hvr-bounce-to-bottom sint">Shiko Librin </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <script type="text/javascript">
                    $(window).load(function() {
                        $("#flexiselDemo1").flexisel({
                            visibleItems: 3,
                            animationSpeed: 1000,
                            autoPlay: false,
                            autoPlaySpeed: 3000,
                            pauseOnHover: true,
                            enableResponsiveBreakpoints: true,
                            responsiveBreakpoints: {
                                portrait: {
                                    changePoint:480,
                                    visibleItems: 1
                                },
                                landscape: {
                                    changePoint:640,
                                    visibleItems:2
                                },
                                tablet: {
                                    changePoint:768,
                                    visibleItems: 3
                                }
                            }
                        });

                    });
                </script>
                <script type="text/javascript" src="js/jquery.flexisel.js"></script>
            </div>
        </div>
    </div>




            <!-- footer --z>


            <!-- //footer -->
            <!-- for bootstrap working -->
            <script src="js/bootstrap.js"> </script>
            <!-- //for bootstrap working -->
            <div class="footer-bottom">
                <div class="container">
                    <p>© 2018 All rights reserved | Design by <a href="/sie/web/index.html"> Adrion Library</a></p>
                </div>
</body>
</html>