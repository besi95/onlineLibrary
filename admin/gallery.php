<?php
session_start();
include 'src/db_connect.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
}

$liberSql = "SELECT id,liber_image FROM liber";
$liber = $conn->query($liberSql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/png" href="../web/images/icon.png"/>

    <title>LIBRARIA-Librat</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/jquery.js"></script>
</head>

<body>

<section id="container">
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="index.php" class="logo"><b>ADRION LIBRARY</b></a>
        <!--logo end-->
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="login.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="profili.php"><img src="assets/img/library.png" class="img-circle"
                                                               width="60"></a></p>
                <h5 class="centered"><?php echo $_SESSION['admin_name'] ?></h5>

                <li class="mt">
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Faqja Kryesore</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a class="active" href="gallery.php">
                        <i class="fa fa-book"></i>
                        <span>Menaxho Librat</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="users.php">
                        <i class="fa fa-user"></i>
                        <span>Menaxho Perdorues</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="blerjet.php">
                        <i class="fa fa-dollar"></i>
                        <span>Menaxho Porosite</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="kategori.php">
                        <i class="fa fa-book"></i>
                        <span>Kategorite</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="komentet.php">
                        <i class="fa fa-cogs"></i>
                        <span>Komentet</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="mesazhet.php">
                        <i class="fa fa-book"></i>
                        <span>Mesazhet</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="chartjs.php">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Raporte</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="profili.php">
                        <i class="fa fa-user-md"></i>
                        <span>Profili</span>
                    </a>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> LIBRAT
                <a style="float:right;display: inline;" href="editoLiber.php?liberId=new" class="btn btn-theme">SHTO
                    LIBER</a>
                <a style="float:right;display: block;margin-right: 10px;background-color: #35a8e1;border: 1px solid #35a8e1 "
                   href="shtoAutor.php" class="btn btn-theme">SHTO AUTOR</a>
            </h3>
            <hr>
            <div class="row mt">
                <?php $i = 0;
                while ($libri = $liber->fetch_assoc()) {
                    ?>

                    <div class="col-md-3 desc text-center" style="margin-top: 10px;">
                        <div class="project-wrapper">
                            <div class="project">
                                <div class="photo-wrapper">
                                    <div class="photo">
                                        <a class="fancybox" href="<?php echo 'imazhe/' . $libri['liber_image'] ?>"><img
                                                    width="80%" style="height: 400px" class="img-rounded"
                                                    src="<?php echo 'imazhe/' . $libri['liber_image'] ?>" alt=""></a>
                                    </div>
                                    <div class="overlay"></div>
                                </div>
                            </div>
                            <a style="display: inline-block;margin-top: 10px;" class="btn btn-theme"
                               href="<?php echo "editoLiber.php?liberId=" . $libri['id'] ?>">Faqja Librit</a>
                        </div>
                    </div><!-- col-lg-4 -->
                <?php } ?>
            </div><!-- /row -->

        </section>
        <! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            &copy; 2018 all the rights reserved by Adrion Library. <a href="gallery.php#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/fancybox/jquery.fancybox.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<!--script for this page-->

<script type="text/javascript">
    $(function () {
        //    fancybox
        jQuery(".fancybox").fancybox();
    });

</script>

<script>
    //custom select box

    $(function () {
        $("select.styled").customSelect();
    });

</script>

</body>
</html>
