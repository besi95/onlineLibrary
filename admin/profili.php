<?php
session_start();
include 'src/db_connect.php';

if(!isset($_SESSION['admin_logged_in'])){
    header('Location: login.php');
}

if(isset($_COOKIE['editim_result'])){
    $results = json_decode($_COOKIE['editim_result']);
    setcookie('editim_result', '', time() - 3600, '/');
}

$userEmail = $_SESSION['admin_email'];
$userSql = "SELECT * FROM user WHERE email = '{$userEmail}'";
$user = $conn->query($userSql);
$user=$user->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>LIBRARIA-Profili</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        input[type="date"] {
            line-height:inherit;
        }
    </style>
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
                <li><a class="logout" href="src/logout.php">Logout</a></li>
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
                    <a href="gallery.php">
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
                    <a href="blerjet.php" >
                        <i class="fa fa-dollar"></i>
                        <span>Menaxho Porosite</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a  href="kategori.php" >
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
                    <a class="active" href="profili.php">
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
        <section class="wrapper">

            <!--main content start-->
            <h3><i class="fa fa-angle-right"></i> EDITO PROFILIN</h3>
            <div class="row mt">
                <!-- left column -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="text-center">
                        <img src="imazhe/user.png" class="avatar img-circle img-thumbnail"
                             alt="avatar">
                    </div>
                </div>
                <!-- edit form column -->
                <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                    <?php
                    foreach($results as $result) {
                        ?>
                        <span style="color: #557eff;"><?php echo $result ?></span><br>
                        <?php
                    }?>
                    <h3>Informacioni Personal</h3>
                    <form class="form-horizontal" role="form" method="post" action="src/editoProfilin.php">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Emri:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="emri" value="<?php echo $user['name']?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mbiemri:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="mbiemri" value="<?php echo $user['lastname']?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Username:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="username" value="<?php echo $user['username']?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="email" value="<?php echo $user['email']?>" type="text" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ditelindja:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="ditelindja" value="<?php echo $user['birthday']?>" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password:</label>
                            <div class="col-md-8">
                                <input class="form-control" name="password" value="11111122333" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Konfirmo Password:</label>
                            <div class="col-md-8">
                                <input class="form-control" name="konfirmo_password" value="11111122333" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input class="btn btn-primary" value="Ruaj Ndryshimet" name="submit" type="submit">
                                <span></span>
                                <input class="btn btn-default" value="Anulo" type="reset">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>


    </section>

    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            &copy; 2018 all the rights reserved by Adrion Library.            <a href="index.php#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.8.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/jquery.sparkline.js"></script>


<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="assets/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="assets/js/sparkline-chart.js"></script>
<script src="assets/js/zabuto_calendar.js"></script>


<script type="application/javascript">
    $(document).ready(function () {
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [
                {type: "text", label: "Special event", badge: "00"},
                {type: "block", label: "Regular event",}
            ]
        });
    });


    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>


</body>
</html>
