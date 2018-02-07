<?php session_start();?>
<?php
if(isset($_COOKIE['registration_success'])){
    $succes = $_COOKIE['registration_success'];
setcookie('registration_success',"",time()-3600,'/');
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
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
	<div class="banner-body logn">
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
						   <a class="navbar-brand" href="index.php"><span>A</span>drion Library</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						 <ul class="nav navbar-nav">
							<li class="hvr-bounce-to-bottom"><a href="index.php">Home</a></li>
							<li class="hvr-bounce-to-bottom"><a href="about.php">Rreth Nesh</a></li>
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
	
			<!-- search-scripts -->
			<script src="js/classie.js"></script>
			<script src="js/uisearch.js"></script>
				<script>
					new UISearch( document.getElementById( 'sb-search' ) );
				</script>
			<!-- //search-scripts -->
			</div>
<!-- //header -->
<!-- login-page -->
	<div class="login">
		<div class="login-grids">
			<div class="col-md-6 log">
					 <h3>Login</h3>
					 <p>Miresevini, ju lutem logohuni per te realizuar blerje ne Adrion Library.</p>
                <?php
                if(isset($succes)){
                    ?>
                    <span class="alert alert-success"><?php echo $succes  ?></span><br>

                    <?php
                }
                ?>
                <form method="post" action="src/user_login.php">
						 <h5>User Name:</h5>	
						 <input type="text" name="email" placeholder="Email"  required>
						 <h5>Password:</h5>
						 <input name="password" placeholder="******" type="password" required>
                    <br>
                         <span style="color: red"><?php echo isset($_COOKIE['usr_login_error']) ?  $_COOKIE['usr_login_error']:"";  ?></span><br>
                         <?php
                         setcookie('usr_login_error','',time()-3600,'/');
                         ?>
                         <hr>
						 <input type="submit" name="submit" value="Login">

					 </form>
				
			</div>
			<div class="col-md-6 login-right">
					<h3>Krijo Llogari</h3>
					<p>Duke u regjistruar ju keni akses te plote ne librari duke lexuar libra te ndryshem, komentuar mbi, beni blerje dhe shume funksionalitete te tjera.</p>
					<a href="register.php" class="hvr-bounce-to-bottom button">Krijo Llogari</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<!-- //login-page -->
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