<?php
session_start();
include 'src/db_connect.php';

if(!isset($_SESSION['admin_logged_in'])){
    header('Location: login.php');
}

$komenteSql = "SELECT COUNT(koment.id) as numri FROM koment";
$libraSql = "SELECT COUNT(liber.id) as numri FROM liber";
$mesazheSql= "SELECT COUNT(mesazhet.id) as numri FROM mesazhet";
$komente = $conn->query($komenteSql);
$komente = $komente->fetch_assoc();

$libra = $conn->query($libraSql);
$libra = $libra->fetch_assoc();
$mesazhe = $conn->query($mesazheSql);
$mesazhe = $mesazhe->fetch_assoc();

$bestUserSql = "SELECT concat(user.name,' ',user.lastname)  AS emri,user.date as user_from FROM user
WHERE id =(
SELECT blerje.user_id FROM blerje
    GROUP BY user_id
    ORDER BY COUNT(blerje.user_id) DESC
    LIMIT 1)";
$bestUser= $conn->query($bestUserSql);
$bestUser = $bestUser->fetch_assoc();

$bestBookSql = "SELECT liber.title,liber.price  FROM liber
WHERE liber.id =(
SELECT koment.liber_id FROM koment
    GROUP BY koment.liber_id
    ORDER BY COUNT(koment.liber_id) DESC
    LIMIT 1
)";
$bestBook= $conn->query($bestBookSql);
$bestBook = $bestBook->fetch_assoc();


$njoftimeSql = "SELECT mesazhet.permbajtja,mesazhet.name,mesazhet.date FROM mesazhet LIMIT 5";
$njoftime = $conn->query($njoftimeSql);



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
      <link rel="shortcut icon" type="image/png" href="../web/images/icon.png"/>

    <title>LIBRARIA-Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
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
            <a href="index.php" class="logo"><b>Adrion Library</b></a>
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
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="profili.php"><img src="assets/img/library.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['admin_name'] ?></h5>

                  <li class="mt">
                      <a class="active" href="index.php">
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
                      <a href="chartjs.php" >
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

              <div class="row">
                  <div class="col-lg-9 main-chart">

                  	<div class="row mtbox">
                  		<div class="col-md-3 col-sm-3 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span class="li_heart"></span>
					  			<h3><?php echo $komente['numri']?></h3>
                  			</div>
					  			<p><?php echo $komente['numri']?> perdorues komentuan librat tuaj!</p>
                  		</div>
                  		<div class="col-md-4 col-sm-4 box0">
                  			<div class="box1">
					  			<span class="li_stack"></span>
					  			<h3><?php echo $mesazhe['numri']?></h3>
                  			</div>
                            <p>Ju keni <?php echo $mesazhe['numri']?> mesazhe te derguara ne inbox. <a class="hide-link" href="mesazhet.php">Mesazhet</a></p>
                  		</div>
                  		<div class="col-md-4 col-sm-4 box0">
                  			<div class="box1">
					  			<span class="li_news"></span>
					  			<h3><?php echo $libra['numri']?></h3>
                  			</div>
					  			<p>Ju numeroni <?php echo $libra['numri']?> libra ne siten tuaj.</p>
                  		</div>

                  	</div><!-- /row mt -->


                      <div class="row mt">

                      	<div class="col-md-6 col-sm-6 mb">
                      		<div class="white-panel pn">
                      			<div class="white-header">
						  			<h5>LIBRI ME I KOMENTUAR</h5>
                      			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-dollar"></i><?php echo $bestBook['price']?></p>
									</div>
									<div class="col-sm-6 col-xs-6"></div>
	                      		</div>
	                      		<div class="centered">
										<img src="assets/img/reading-2.png" width="120">
	                      		</div>
                                <div class="centered">
                                    <p><?php echo $bestBook['title']?></p>
                                </div>
                      		</div>
                      	</div><!-- /col-md-4 -->

						<div class="col-md-6 mb">
							<!-- WHITE PANEL - TOP USER -->
							<div class="white-panel pn">
								<div class="white-header">
									<h5>PERDORUESI ME I MIRE</h5>
								</div>
								<p><img src="assets/img/loyalty.png" class="img-circle" width="80"></p>
								<p><b><?php echo $bestUser['emri']?></b></p>
								<div class="row">
									<div class="col-md-6">
										<p class="small mt">PERDORUES PREJ:</p>
										<p><?php echo $bestUser['user_from']?></p>
									</div>
								</div>
							</div>
						</div><!-- /col-md-4 -->


                    </div><!-- /row -->


                  </div><!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->

                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>NJOFTIME</h3>


                      <?php while($njoftim = $njoftime->fetch_assoc()){?>

                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted><?php echo $njoftim['date']?></muted><br/>
                      		   <a href="#"><?php echo $njoftim['name']?></a> <?php echo $njoftim['permbajtja'] ?><br/>
                      		</p>
                      	</div>
                      </div>
                      <?php } ?>



                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->

                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              &copy; 2018 all the rights reserved by Adrion Library.
              <a href="index.php#" class="go-top">
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
                    {type: "block", label: "Regular event", }
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
