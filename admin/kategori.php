<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header('Location: login.php');
}
include 'src/db_connect.php';
$categorySql = "SELECT * FROM categories";
$categories = $conn->query($categorySql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>LIBRARIA-Kategorite</title>

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>


    <script src="assets/js/chart-master/Chart.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                    <a class="active" href="kategori.php">
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
        <section class="wrapper">

            <!--main content start-->
            <h3><i class="fa fa-angle-right"></i> MENAXHO KATEGORITE</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Kategorite</h4>
                        <section id="unseen">
                            <br><br>
                            <div class="panel panel-default panel-table">
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered table-list">
                                        <thead>
                                        <tr>
                                            <th class="hidden-xs">NR #</th>
                                            <th>Kategoria</th>
                                            <th style="text-align: center"><em class="fa fa-cog"></em></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php while ($kategori = $categories->fetch_assoc()) { ?>
                                            <tr>
                                                <td style="text-align: center"
                                                    class="hidden-xs"><?php echo $kategori['id'] ?></td>
                                                <td><?php echo $kategori['category_name'] ?></td>
                                                <td align="center">
                                                    <a href="src/fshiKategori.php?categoryId=<?php echo $kategori['id'] ?>"
                                                       class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </section>
                    </div><!-- /content-panel -->
                </div><!-- /col-lg-4 -->
            </div><!-- /row -->

            <div class="row mt">
                <div class=" cart-form col-md-12">
                        <h4 class="title"> Shto Kategori</h4>
                    <br>
                    <div class="content">
                        <form method="post" action="src/shtoKategori.php">
                            <div class="col-md-4">
                                <div class="form-group input-forma ">
                                    <label>Emërtimi</label>
                                    <input type="text" name="emer_kategoria" class="form-control border-input">

                                </div>
                            </div>

                            <div style="padding-top: 20px;">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Shto Kategorine</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>


            </div>
            </div><!-- /col-lg-9 END SECTION MIDDLE -->

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
