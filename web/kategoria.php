<?php
session_start();
include "src/db_connect.php";
$katId = $_GET['katID'];
$kategorySql = "SELECT * FROM `categories` WHERE id= '{$katId}'";
$result = $conn->query($kategorySql);
$titleKat = $result->fetch_assoc();
$titleKat = $titleKat['category_name'];
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $titleKat?></title>
    <link rel="shortcut icon" type="image/png" href="images/icon.png"/>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <!-- start-smoth-scrolling -->
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
                            <?php if(isset($_SESSION['usr_logged_in'])){?>
                                <li class="hvr-bounce-to-bottom"><a href="blerjet.php">Blerjet e Mia</a></li>
                            <?php }?>
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
        </div>
        <!-- //header -->
        <!-- pages -->
        <div class="pages faqja-librit-wrapper">
            <h1 class="custom-header-kat"><?php echo $titleKat?></h1>
            <div class="banner-bottom">
                <div class="row liber-faqe">
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

            <!-- for bootstrap working -->
            <script src="js/bootstrap.js"> </script>
            <!-- //for bootstrap working -->
            <div class="footer-bottom">
                <div class="container">
                    <p>© 2018 All rights reserved | Design by <a href="#"> Adrion Library</a></p>
                </div>
</body>
</html>
<head>
    <script>
        function getresult(url) {
            $.ajax({
                url: url,
                type: "GET",
                data:  {rowcount:$("#rowcount").val(),katId:<?php echo $katId?>},
                success: function(data){
                    $(".liber-faqe").html(data);
                },
                error: function()
                {}
            });
        }
    </script>
    <script>
        getresult("../pagination/getresult.php");
    </script>
</head>