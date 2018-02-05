<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Contact</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Quickly Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
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
</head>

<body>
<!-- banner-body -->
	<div class="banner-body cntct">
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
							<li class="hvr-bounce-to-bottom"><a href="portfolio.php">Kategorite</a></li>
							
							<li class="hvr-bounce-to-bottom active"><a href="contact.php">Kontakt</a></li>
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
<!-- contact -->
	<div class="contact">
		<div class="contact-left">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2620.908687693293!2d2.3574429999999995!3d48.936181!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66eb34e18b951%3A0xc3c6a4ac9498bfce!2sWorld&#39;s+Business+Import!5e0!3m2!1sen!2sin!4v1429768672602" frameborder="0" style="border:0"></iframe>
		</div>
		<div class="contact-right">
			<p class="phn">+355 481 5842</p>
			<p class="phn-bottom">
					<span>Sheshi Skenderbej, Pallati Kultures, Tirane
</span></p>
			<p class="lom">Adrian gjithashtu ka filiale te vogla ne te dy anet e hyrjes dhe ne katin e poshtem te qendres Galeria</p>
		</div>
		<div class="clearfix"> </div>
		<div class="contact-left1">
			<h3>Na kontaktoni <span>Keni pyetje</span></h3>
			<div class="in-left">
				<form>
					<input type="text" placeholder="Emri juaj:" required=" ">
					<input type="text" placeholder="Numri i telefonit:" required=" ">
					<input type="text" placeholder="E-mail:" required=" ">
				</form>
			</div>
			<div class="in-right">
				<form>
					<textarea placeholder="Mesazhi:" required=" "></textarea>
					<input type="submit" value="Dergo">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="contact-right1">
			<h3>Na gjeni ne<span>Media sociale</span></h3>

			<p>Na gjeni kudo edhe ne media sociale. Jemi cdo moment te disponueshem per te permbushur kerkesuat tuaja. Stafi ne dispozicionin tuaj!</p>
			<ul>
				<li><a href="#" class="g1"> </a></li>
				<li><a href="#" class="p1"> </a></li>
				<li><a href="#" class="facebook1"> </a></li>
				<li><a href="#" class="twitter1"> </a></li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- //contact -->
		</div>
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