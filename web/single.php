<?php
include "src/db_connect.php";
$liberId = $_GET['liberId'];

//merr librin nga databasa
$liberSql = "SELECT * from liber WHERE id='{$liberId}'";
$result = $conn->query($liberSql);
$libri = $result->fetch_assoc();
//var_dump($libri);
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $libri['title']?></title>
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
                            <a class="navbar-brand" href="index.php"><span>Adrion</span> Library</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="hvr-bounce-to-bottom active"><a href="index.php">Home</a></li>
                                <li class="hvr-bounce-to-bottom"><a href="about.php">Rreth Nesh</a></li>
                                <li class="hvr-bounce-to-bottom"><a href="portfolio.php">Kategorite</a></li>

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
<!-- single -->
	<div class="single-page-artical">
		<div class="artical-content">
			<h3>Lorem Ipsum is simply dummy text</h3>
			<img class="img-responsive" src="images/banner.jpg" alt=" " />
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<div class="artical-links">
			<ul>
				<li><small> </small><span>June 30, 2015</span></li>
				<li><a href="#"><small class="admin"> </small><span>admin</span></a></li>
				<li><a href="#"><small class="no"> </small><span>2 comments</span></a></li>
			</ul>
		</div>
		<div class="comment-grid-top">
			<h3>Komentet</h3>
			<div class="comments-top-top">
				<div class="top-comment-left">
					<a href="#"><img class="img-responsive" src="images/co.png" alt=""></a>
				</div>
				<div class="top-comment-right">
					<ul>
						<li><span class="left-at"><a href="#">Admin</a></span></li>
						<li><span class="right-at">June 30, 2015 at 10.30am</span></li>
					</ul>
				<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.The point of using Lorem Ipsum is that it has a more-or-less </p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="comments-top-top top-grid-comment">
				<div class="top-comment-left">
					<a href="#"><img class="img-responsive" src="images/co.png" alt=""></a>
				</div>
				<div class="top-comment-right">
					<ul>
						<li><span class="left-at"><a href="#">Admin</a></li>
						<li><span class="right-at">June 30, 2015 at 10.30am</span></li>
						<li><a class="reply" href="#">REPLY</a></li>
					</ul>
				<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.The point of using Lorem Ipsum is that it has a more-or-less </p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>			
		<div class="artical-commentbox">
			<h3>Lini nje Koment</h3>
			<div class="table-form">
				<form>
					<input type="text" style="width: 46%; display: inline" class="textbox" name="emri" value="Emri" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
					<input type="text" style="width: 46%; display: inline" class="textbox" email="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
					<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mesazhi';}">Mesazhi</textarea>
					<input type="submit" name="submit" value="Komento">
				</form>
			</div>
		</div>	
	</div>
<!-- single -->
		</div>
	</div>
<!-- footer -->
<div class="footer-bottom">
		<div class="container">
			<p>© 2018 Quickly. All rights reserved | Design by <a href="http://w3layouts.com/"> W3layouts</a></p>
		</div>
	</div>
<!-- //footer -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
</body>
</html>