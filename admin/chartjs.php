<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
      <link rel="shortcut icon" type="image/png" href="../web/images/icon.png"/>

    <title>LIBRARIA-Raporte</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
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
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <p class="centered"><a href="profili.php"><img src="assets/img/library.png" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><?php echo $_SESSION['admin_name'] ?></h5>

                  <li class="mt">
                      <a href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Faqja Kryesore</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="gallery.php" >
                          <i class="fa fa-book"></i>
                          <span>Menaxho Librat</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="users.php" >
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
                      <a href="komentet.php" >
                          <i class="fa fa-cogs"></i>
                          <span>Komentet</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="mesazhet.php" >
                          <i class="fa fa-book"></i>
                          <span>Mesazhet</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href="chartjs.php" >
                          <i class="fa fa-bar-chart-o"></i>
                          <span>Raporte</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="profili.php" >
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
          <h3><i class="fa fa-angle-right"></i> RAPORTE</h3>
              <!-- page start-->
              <div class="tab-pane" id="chartjs">
                  <div class="row mt">
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i> Librat sipas Kategorive</h4>
                              <div class="panel-body text-center">
                                  <div id="piechart" style="width: 500px; height: 400px;"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i> Komentet sipas Librave</h4>
                              <div class="panel-body text-center">
                                  <div id="piechart2" style="width: 500px; height: 400px;"></div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row mt">
                      <div class="col-lg-12">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i> Komentet sipas Librave</h4>
                              <div class="panel-body text-center">
                                  <div id="columnchart_values" style="width: 100%; height: 400px;"></div>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
              <!-- page end-->
          </section>
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              &copy; 2018 all the rights reserved by Adrion Library.              <a href="chartjs.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/chart-master/Chart.js"></script>
    <script src="assets/js/chartjs-conf.js"></script>

  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>

<?php
include 'src/db_connect.php';
$libraQuery = "SELECT categories.category_name,COUNT(liber.id) AS numri
               FROM categories,liber
               WHERE categories.id = liber.category
               GROUP BY categories.id";
$result = $conn->query($libraQuery);


?>
<!--first chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            var data = google.visualization.arrayToDataTable([

                ['Kategoria', 'Nr Librave'],
                <?php

                while($liber = $result->fetch_assoc()){

                ?>
                ['<?php echo $liber['category_name']?>', <?php echo $liber['numri']?>],
                <?php
                }
                ?>
            ]);

            var options = {
                title: 'Kategorite'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
<!-- first chart end-->


<!-- second chart -->
<?php
$komenteQuery = "SELECT liber.title,COUNT(koment.id) AS numri
                  FROM koment,liber
                  WHERE liber.id = koment.liber_id
                  GROUP BY liber.id";
$result = $conn->query($komenteQuery);
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable([

            ['Liber', 'Nr Komenteve'],
            <?php

            while($liber = $result->fetch_assoc()){

            ?>
            ['<?php echo $liber['title']?>', <?php echo $liber['numri']?>],
            <?php
            }
            ?>
        ]);

        var options = {
            title: 'Komentet'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
    }
</script>
<!-- second chart end-->





<!--third chart-->
<?php
$blerjeQuery = "SELECT COUNT(blerje.user_id)AS numri,concat(user.name,' ',user.lastname) AS emri FROM blerje
INNER JOIN user ON blerje.user_id = user.id
GROUP BY blerje.user_id";
$blerje = $conn->query($blerjeQuery);
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Klienti", "Nr Blerjeve", { role: "style" } ],
            <?php while($blerja = $blerje->fetch_assoc()){
            $rand = dechex(rand(0x000000, 0xFFFFFF));
            ?>
            ["<?php echo $blerja['emri']?>", <?php echo $blerja['numri'] ?>, "<?php echo('#' . $rand);?>"],
            <?php }?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" },
            2]);

        var options = {
            title: "Numri i Blerjeve",
            width: 600,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
</script>

<!--third chart end-->

