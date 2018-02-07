<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Rreth Nesh </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Adrion Library">
    <meta name="author" content="Besim Saraci">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
							<li class="hvr-bounce-to-bottom active"><a href="about.php">Rreth Nesh</a></li>
							<li class="hvr-bounce-to-bottom"><a href="portfolio.php">Kategorite</a></li>
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
<!-- about-page -->
	<div class="about">
			<div class="about-text">
				<h3>Rreth Nesh</h3>
			</div>
			<div class="about-info">

				<p>Libraria Adrion eshte nje librari private e krijuar ne vitin 2000 per te inkurajuar idealet e nje shoqerie te edukuar permes dijes qe shperndajne librat<br/><br/></p><div class="col-md-5 about-info-left">
					<img src="images/Library-Adrion.png" alt=""/>
				</div>
				<div class="col-md-7 about-info-right">
					<h4>Pershkrim rreth librarise</h4>
					<p>Libraria Adrion e pozicionuar prane sheshit "Skenderbej" tek pallati i kultures, numeron plote 18 vite ne tregun e librarive ne Shqiperi. Gjate gjithe viteve ajo ka operuar duek patur nje nderveprim te drejteperdrejte fizik me libradashesit e saj, te cilet kane patur mundesine
					te gjejne libra te kategorive te ndryshme te tilla si romane, libra me poezi, libra te historise, artit, kultures dhe shkences, libra me sfond politike.</p></div>
				<div class="clearfix"> </div>

			</div>
			<div class="about-grid">
				<div class="col-md-4 about-text-info">
					<h4>Inovacion</h4>
					<h5></h5>
					<p class="about-pgh">Gjate gjithe ketyre viteve jemi perpjekur qe te jemi sa me prane lexuesve duke ofruar librat me te fundit ne treg.
					Tashme kemi menduar nje menyre tjeter per te qene akoma me afer lexuesve tane besnike. Libraria jone tani vjen edhe online ne te cilen lexuesit
					mund te marrin cdo informacion mbi librat dhe te kene mundesi blerje.</p>
					</div>
				<div class="col-md-4 about-text-info">
					<h4>Aftesite Tona</h4>
					<h5></h5>
					<p class="about-pgh">Nje nder pikat tona me te forta eshte kujdesi i vecante qe kushtojme ndaj cdo klienti, duke asistuar me sugjerimet tona mbi librat e kategorive per te cilat ata kane nevoje
					, duke krijuar nje rrjet lexuesish besnik ne te gjithe vendin. Theksi yne eshte tek konsumatoret dhe cdo sherbim ka si pikenisje nevojat dhe deshirat e tyre. <p/></div>
				<div class="col-md-4 about-text-info">
					<h4>Stafi</h4>
					<h5></h5>
					<p class="about-pgh">Pas gjithe punes se madhe nder vite te cilen e kane ngritur librarine tone ne keto nivele, qendron nje staf i kualifikuar dhe i perkushtuar per ti sherbyer ne menyren me te mire te mundshme klienteve tane. Stafi jone perbehet nga personat qe menaxhojne ne menyre fizike librat dhe se fundmi personat qe merren me menaxhimin e shit-blerjeve
					online te librave.</p></div>
				<div class="clearfix"> </div>
			</div>

			</div>

<!-- //about-page -->
		</div>
	</div>
	</div>
<!-- //footer -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
<div class="footer-bottom">
<div class="container">
			<p>© 2018 All rights reserved | Design by <a href="/sie/web/index.php"> Adrion Library</a></p>
		</div>
</body>
</html>