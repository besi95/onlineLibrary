<?php
session_start();
include 'src/db_connect.php';
$kategorySql = "SELECT * FROM `categories`";
$result = $conn->query($kategorySql);

?>
<!DOCTYPE html>
<html>
<head>
<title>Zgjidhni Kategorine e Librave </title>
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
<!-- for portfolio -->
<link rel="stylesheet" type="text/css" href="css/style5.css" />
<link rel="stylesheet" type="text/css" href="css/common.css" />
<!-- //for portfolio -->
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

			<!-- search-scripts -->
			<script src="js/classie.js"></script>
			<script src="js/uisearch.js"></script>
				<script>
					new UISearch( document.getElementById( 'sb-search' ) );
				</script>
			<!-- //search-scripts -->
			</div>
<!-- //header -->
<!-- portfolio -->
			<div class="portfolio">
				<h3>Kategorite e Librave</h3>
			<section class="main">
				<ul class="ch-grid">
                    <?php while($kategori = $result->fetch_assoc()){?>
					<li>
						<div class="ch-item ch-img-1">
							<div class="ch-info-wrap">
								<div class="ch-info">
									<div class="ch-info-front ch-img-1"></div>
									<div class="ch-info-back">
										<h3>Kategoria</h3>
										<a href="kategoria.php?katID=<?php echo $kategori['id']?>"<p><?php echo $kategori['category_name'] ?></p></a>
									</div>
								</div>
							</div>
						</div>
                        <h2><i><?php echo $kategori['category_name'] ?></i></h2>
					</li>
                    <?php } ?>
				</ul>
			</section>

			</div>
<!-- //portfolio -->
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<p>© 2018 All rights reserved | Design by <a href="http://w3layouts.com/">Adrion Library</a></p>
		</div>
	</div>
<!-- //footer -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
</body>
</html>