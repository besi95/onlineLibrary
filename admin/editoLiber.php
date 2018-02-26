<?php
session_start();
include "src/db_connect.php";

if(isset($_COOKIE['editim_status'])){
    $messages = json_decode($_COOKIE['editim_status']);
    setcookie('editim_status', '', time() - 3600, '/');

}


if(!isset($_SESSION['admin_logged_in'])){
    header('Location: login.php');
}


$liberId = $_GET['liberId'];

//merr kategorite e librave
$kategoriSql = "SELECT * from categories";
$result = $conn->query($kategoriSql);

$liberSql = "SELECT * FROM liber
              INNER JOIN categories ON categories.id = liber.category
              WHERE liber.id='{$liberId}'";
$liber = $conn->query($liberSql);
$liber=$liber->fetch_assoc();


$autorSql = "SELECT id FROM autor_liber
              INNER JOIN autor ON autor.id = autor_liber.autor_id
              WHERE autor_liber.liber_id = '{$liberId}'";
$autor =$conn->query($autorSql);
$autoret =array();

while($autori = $autor->fetch_assoc()){
    $autoret[] = $autori['id'];
}

$allAuthorsSql = "SELECT concat(firstname,' ',lastname) AS emri,id FROM autor";
$allAuthors = $conn->query($allAuthorsSql);

$totalAutoret = array();
while($autorT = $allAuthors->fetch_assoc()){
    $totalAutoret[] = $autorT;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/png" href="../web/images/icon.png"/>

    <title>LIBRARIA-Liber i Ri</title>

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
            <?php if(isset($messages)){?>

                <div class="alert alert-danger" ><?php echo $messages[0]?></div>
            <?php }?>

            <?php if ($liberId == 'new') { ?>
                <!--main content start-->
                <h3><i class="fa fa-angle-right"></i> SHTO LIBER</h3>
                <div class="row mt">
                    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="src/shtoLiber.php">
                        <!-- left column -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="text-center">
                                <h>Foto e Librit</h>
                                <input type="file" name="imazhi" class="text-center center-block well well-sm">
                            </div>
                        </div>
                        <!-- edit form column -->
                        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                            <h3>Informacionet e Librit</h3>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Titulli:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="titulli"  type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Shtepia Botuese:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="shtepia-botuese"  type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Kategoria:</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="kategoria" type="text" required>
                                        <?php while($kategorite = $result->fetch_assoc()){ ?>
                                            <option value="<?php echo $kategorite['id'] ?>"><?php echo $kategorite['category_name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Pershkrimi:</label>
                                <div class="col-lg-8">
                                    <textarea required="required" class="form-control" name="pershkrimi" placeholder="Pershkrimi" cols="40"
                                              rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Autori:</label>
                                <div class="col-lg-8">
                                    <?php foreach ($totalAutoret as $autor){?>
                                        <input class="form-check-input"  name="autori[]" value="<?php echo $autor['id']?>" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            <?php echo $autor['emri']?>
                                        </label><br>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Cmimi:</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="cmimi"  type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Stoku:</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="stoku"  type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <input class="btn btn-primary" name="submit" value="Ruaj Ndryshimet" type="submit">
                                    <span></span>
                                    <input class="btn btn-default" value="Anulo" type="reset">
                                </div>
                            </div>
                    </form>
                </div>
                </div>
            <?php } else {
                ?>
                <!--existing book-->
                <!--main content start-->
                <h3><i class="fa fa-angle-right"></i> EDITO LIBRIN</h3>
                <a style="float:right;display: inline" href="src/fshiLiber.php?liberId=<?php echo $liberId?>" class="btn btn-theme">FSHI LIBRIN</a>

                <div class="row mt">
                    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="src/editoLiber.php">
                        <!-- left column -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="text-center">
                                <input type="hidden" name="liber_id" value="<?php echo $liberId?>">
                                <input type="hidden" value="<?php echo $liber['liber_image']?>" name="old_image">
                                <img src="<?php echo 'imazhe/'.$liber['liber_image']?>"
                                     class="avatar img-rounded img-thumbnail"
                                     alt="Foto">
                                <h6>Ndrysho Foton e Librit...</h6>
                                <input type="file" name="imazhi" class="text-center center-block well well-sm">
                            </div>
                        </div>
                        <!-- edit form column -->
                        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                            <h3>Informacionet e Librit</h3>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Titulli:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="titulli" value="<?php echo $liber['title']?>" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Shtepia Botuese:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="shtepia-botuese" value="<?php echo $liber['publisher']?>" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Kategoria:</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="kategoria" type="text" required>
                                        <?php while($kategorite = $result->fetch_assoc()){ ?>
                                            <option <?php echo $liber['category']==$kategorite['id'] ? "selected='selected'": ''?> value="<?php echo $kategorite['id'] ?>"><?php echo $kategorite['category_name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Pershkrimi:</label>
                                <div class="col-lg-8">
                                    <textarea required="required" class="form-control" name="pershkrimi"  cols="40"
                                              rows="5"><?php echo $liber['description']?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Autori:</label>
                                <div class="col-lg-8">
                                    <?php foreach ($totalAutoret as $autor){?>
                                        <input class="form-check-input" <?php echo in_array($autor['id'],$autoret) ? "checked='checked'": '' ?> name="autori[]" value="<?php echo $autor['id']?>" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            <?php echo $autor['emri']?>
                                        </label><br>
                                <?php }?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Cmimi:</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="cmimi" value="<?php echo $liber['price']?>" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Stoku:</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="stoku" value="<?php echo $liber['stock']?>" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <input class="btn btn-primary" name="submit" value="Ruaj Ndryshimet" type="submit">
                                    <span></span>
                                    <input class="btn btn-default" value="Anulo" type="reset">
                                </div>
                            </div>
                    </form>
                </div>
                </div>


                <?php
            } ?>
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
