<?php
session_start();
include 'src/db_connect.php';

if (!isset($_SESSION['usr_logged_in'])) {
    header('Location: login.php');
}

$userId = $_SESSION['user_id'];;

//merr blerjet nga databasa
$blerjeSql = "SELECT *,blerje.id AS numri FROM blerje 
              INNER JOIN liber ON liber.id = blerje.liber_id
              WHERE blerje.user_id ='{$userId}'";

$result = $conn->query($blerjeSql);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Adrion | Blerjet</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="description" content="Adrion Library">
    <meta name="author" content="Besim Saraci">
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
                            <li class="hvr-bounce-to-bottom "><a href="index.php">Home</a></li>
                            <li class="hvr-bounce-to-bottom"><a href="about.php">Rreth Nesh</a></li>
                            <li class="hvr-bounce-to-bottom"><a href="portfolio.php">Kategorite</a></li>
                            <?php if(isset($_SESSION['usr_logged_in'])){?>
                                <li class="hvr-bounce-to-bottom active"><a href="blerjet.php">Blerjet e Mia</a></li>
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
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <center><h2 class="styled-title">Blerjet tuaja</h2></center>
                            <br><br>
                            <div class="content table-responsive table-full-width">
                                <?php if($result->num_rows > 0){?>
                                <table class="table table-striped">
                                    <thead>
                                    <th>Blerje #</th>
                                    <th></th>
                                    <th>Libri</th>
                                    <th>Data e Blerjes</th>
                                    <th>Totali</th>
                                    <th>Statusi i Porosise</th>
                                    </thead>
                                    <tbody>

                                    <?php while ($blerje = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $blerje['numri']; ?></td>
                                            <td><img src="<?php echo '../admin/imazhe/'.$blerje['liber_image']?>" width="100" height="150" ></td>
                                            <td><?php echo $blerje['title']; ?></td>
                                            <td><?php echo $blerje['creation_date']; ?></td>
                                            <td><?php echo $blerje['total'].' $'; ?></td>
                                            <td><?php echo $blerje['status'] == '1' ? "<span class='label label-success'>Kompletuar</span>" : "<span class='label label-danger'>Jo e Kompletuar</span>" ?></td>

                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <?php }else{?>
                                <h1 style="color: #1fbcff;">Ju nuk keni kryer asnje blerje!</h1>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p>© 2018 All rights reserved | Design by <a href="http://w3layouts.com/">Adrion Library</a></p>
        </div>
    </div>
</div>
<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>
