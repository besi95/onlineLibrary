<?php session_start();
$errors = array();
if(isset($_COOKIE['registration_error'])) {
    $errors = json_decode($_COOKIE['registration_error']);
    setcookie('registration_error', '', time() - 3600, '/');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Regjistrohu</title>
    <link rel="shortcut icon" type="image/png" href="images/icon.png"/>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
<div class="banner-body regstr">
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
                        <a class="navbar-brand" href="index.php"><span>Adrion Library</span></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="hvr-bounce-to-bottom"><a href="index.php">Home</a></li>
                            <li class="hvr-bounce-to-bottom"><a href="about.php">Rreth Nesh</a></li>
                            <li class="hvr-bounce-to-bottom"><a href="portfolio.php">Kategorite</a></li>
                            <?php if(isset($_SESSION['usr_logged_in'])){?>
                                <li class="hvr-bounce-to-bottom"><a href="blerjet.php">Blerjet e Mia</a></li>
                            <?php }?>
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
        </div>
        <!-- //header -->
        <!-- register -->
        <div class="sign-up-form">
            <h3>Regjistrohu</h3>
            <p>Duke u regjistruar ju keni akses te plote ne librari duke komentuar, bere blerje, etj.</p>
            <div class="sign-up">

                <?php
                if (count($errors) > 0) {

                    foreach ($errors as $error) {
                        ?>
                        <div style="margin-left: 40%;" class="alert alert-danger">
                            <span ><?php echo $error ?></span><br>
                        </div>
                        <?php
                    }
                } ?>

                <h5>Informacion Personal</h5>
                <form method="post" action="src/user_registration.php">
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4 class="a">Emri* :</h4>
                        </div>
                        <div class="sign-up2">

                            <input type="text" name="emri" placeholder=" " required=" "/>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4 class="b">Mbiemri* :</h4>
                        </div>
                        <div class="sign-up2">

                            <input name="mbiemri" type="text" placeholder=" " required=" "/>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4 class="c">Username* :</h4>
                        </div>
                        <div class="sign-up2">

                            <input type="text" name="username" placeholder=" " required=" "/>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4 class="c">Ditelindja* :</h4>
                        </div>
                        <div class="sign-up2">

                            <input type="date" name="ditelindja" placeholder=" " required=" "/>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4 class="c">Email* :</h4>
                        </div>
                        <div class="sign-up2">

                            <input type="text" name="email" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" placeholder=" " required=" "/>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <h6>Informacioni Login</h6>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4 class="d">Password* :</h4>
                        </div>
                        <div class="sign-up2">

                            <input type="password" name="password" placeholder=" " required=" "/>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Konfirmo Password* :</h4>
                        </div>
                        <div class="sign-up2">

                            <input type="password" name="konfirmo_password" placeholder=" " required=" "/>

                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <input type="submit" name="submit" value="Submit">
                </form>

            </div>
        </div>
        <!-- //register -->
    </div>
</div>

<div class="footer-bottom">
    <div class="container">
        <p>© 2018  All rights reserved | Design by <a href="#">Adrion Library</a></p>
    </div>
</div>
<!-- //footer -->
<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>