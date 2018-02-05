<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Library</title>
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
	<div class="banner-body">
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
<!-- header-bottom -->
	<div class="header-bottom">
		<div class="header-bottom-top">
			<ul>
				<li><a href="#" class="g"> </a></li>
				<li><a href="#" class="p"> </a></li>
				<li><a href="#" class="facebook"> </a></li>
				<li><a href="#" class="twitter"> </a></li>
			</ul>
		</div>
		<div class="clearfix"> </div>
<!-- banner -->
		<div class="banner">
<!-- Slider-starts-Here -->
				<script src="js/responsiveslides.min.js"></script>
				 <script>
				    // You can also use "$(window).load(function() {"
				    $(function () {
				      // Slideshow 4
				      $("#slider3").responsiveSlides({
				        auto: true,
				        pager: false,
				        nav: true,
				        speed: 500,
				        namespace: "callbacks",
				        before: function () {
				          $('.events').append("<li>before event fired.</li>");
				        },
				        after: function () {
				          $('.events').append("<li>after event fired.</li>");
				        }
				      });
				
				    });
				  </script>
			<!--//End-slider-script -->
				<div  id="top" class="callbacks_container wow fadeInUp" data-wow-delay="0.5s">
					<ul class="rslides" id="slider3">
						<li>
							<div class="banner-inf">
								<h3></h3>
								<p>Nje nga zgjidhjet me te mira per te kaluar kohen tuaj te lire. </br> Zgjidhni librat Adrion.</p>
								
							</div>
						</li>
						<li>
							<div class="banner-inf">
								<h3>Librat qe ofrohen</h3>
								<p><strong>Adrion</strong>- Mundesia me e mire per te gjetur ate qe kerkoni. Ne ofrojme nje game te gjere librash te kategorive te ndryshme duke perfshire novela, romane, libra arti, guida, si edhe libra mbi historine dhe artin. Tek ne gjithashtu mund te gjeni katrolina te vjetra bardhe e zi. </p>
								
							</div>
						</li>
						
					</ul>
				</div>
		</div>
<!-- //banner -->
<!-- banner-bottom -->
			<div class="banner-bottom">
				<ul id="flexiselDemo1">			
					<li>
						<div class="banner-bottom-grid">
							<img src="images/libri1.jpg" alt=" " class="img-responsive" />
							<p>Duke mbuluar cdo gje nga Edison tek Avatar, Gjeometria dhe Pafort - Overduin kane shkruar librin  me te qarte,me te mireorganizuar , dhe me te perdorshem ne treg mbi historine e filmit. Ajo me mjeshteri pershkruan tendencat e medha dhe levizjet e historise se filmit .</p>
							<div class="more">
								<a href="single.php" class="hvr-bounce-to-bottom sint">Lexo me teper</a>
							</div>
						</div>
					</li>
					<li>
						<div class="banner-bottom-grid">
							<img src="images/libri2.jpg" alt=" " class="img-responsive" />
							<p>At vero eos et accusamus et iusto odio dignissimos ducimus 
								qui blanditiis praesentium voluptatum deleniti atque corrupti 
								quos dolores et quas molestias excepturi sint occaecati
								cupiditate non provident</p>
							<div class="more">
								<a href="single.php" class="hvr-bounce-to-bottom sint">Lexo me teper</a>
							</div>
						</div>
					</li>
					<li>
						<div class="banner-bottom-grid">
							<img src="images/libri3.jpg" alt=" " class="img-responsive" />
							<p>At vero eos et accusamus et iusto odio dignissimos ducimus 
								qui blanditiis praesentium voluptatum deleniti atque corrupti 
								quos dolores et quas molestias excepturi sint occaecati
								cupiditate non provident</p>
							<div class="more">
								<a href="single.php" class="hvr-bounce-to-bottom sint">Lexo me teper</a>
							</div>
						</div>
					</li>
				</ul>
				<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 3,
									animationSpeed: 1000,
									autoPlay: false,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 1
										}, 
										landscape: { 
											changePoint:640,
											visibleItems:2
										},
										tablet: { 
											changePoint:768,
											visibleItems: 3
										}
									}
								});
								
							});
					</script>
					<script type="text/javascript" src="js/jquery.flexisel.js"></script>
			</div>
<!-- //banner-bottom -->
<!-- blog -->
			<div class="blog">
				<div class="blog-left">
					<div class="blog-left-grid">
					
						<div class="clearfix"> </div>
						<a href="single.php"><img src="images/libri4.jpg" alt=" " class="img-responsive" /></a>
						<p class="para"> Itaque earum rerum hic tenetur a sapiente delectus, 
							ut aut reiciendis voluptatibus maiores alias consequatur aut 
							perferendis doloribus asperiores repellat.Et harum quidem rerum 
							facilis est et expedita distinctio. Nam libero tempore, cum 
							soluta nobis est eligendi optio cumque nihil impedit quo minus 
							id quod maxime placeat facere possimus, omnis voluptas assumenda 
							est, omnis dolor repellendus. Temporibus autem quibusdam et 
							aut officiis debitis.</p>
						<div class="rd-mre">
							<a href="single.php" class="hvr-bounce-to-bottom quod">Lexo me teper</a>
						</div>
					</div>
					<div class="blog-left-grid">
						
						
						<div class="clearfix"> </div>
						<a href="single.php"><img src="images/libri5.jpg" alt=" " class="img-responsive" /></a>
						<p class="para"> Itaque earum rerum hic tenetur a sapiente delectus, 
							ut aut reiciendis voluptatibus maiores alias consequatur aut 
							perferendis doloribus asperiores repellat.Et harum quidem rerum 
							facilis est et expedita distinctio. Nam libero tempore, cum 
							soluta nobis est eligendi optio cumque nihil impedit quo minus 
							id quod maxime placeat facere possimus, omnis voluptas assumenda 
							est, omnis dolor repellendus. Temporibus autem quibusdam et 
							aut officiis debitis.</p>
						<div class="rd-mre">
							<a href="single.php" class="hvr-bounce-to-bottom quod">Lexo me teper</a>
						</div>
					</div>
				</div>
				<div class="blog-right">
					<div class="sap_tabs">	
					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
							  <li class="resp-tab-item grid1" aria-controls="tab_item-0" role="tab"><span>Me te shikuarat</span></li>
							  <li class="resp-tab-item grid2" aria-controls="tab_item-1" role="tab"><span>Te fundit</span></li>
							  <li class="resp-tab-item grid3" aria-controls="tab_item-2" role="tab"><span>Komente</span></li>
							  <div class="clear"></div>
						  </ul>				  	 
							<div class="resp-tabs-container">
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
									<div class="facts">
									  <div class="tab_list">
										<a href="images/7-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
											<img src="images/7.jpg" alt=" " class="img-responsive" />
										</a>
									  </div>
									  <div class="tab_list1">
										<a href="#">excepturi sint occaecati</a>
										<p>June 30,2015 <span>Nam libero tempore, cum soluta nobis.</span></p>
									  </div>
									  <div class="clearfix"> </div>
									</div>
									<div class="facts">
									   <div class="tab_list">
										<a href="images/8-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
											<img src="images/8.jpg" alt=" " class="img-responsive" />
										</a>
									  </div>
									  <div class="tab_list1">
										<a href="#">excepturi sint occaecati</a>
										<p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
									  </div>
									  <div class="clearfix"> </div>
									</div>
									<div class="facts">
									   <div class="tab_list">
										<a href="images/9-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
											<img src="images/9.jpg" alt=" " class="img-responsive" />
										</a>
									  </div>
									  <div class="tab_list1">
										<a href="#">excepturi sint occaecati</a>
										<p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
									  </div>
									  <div class="clearfix"> </div>
									</div>
									<div class="facts">
									   <div class="tab_list">
										<a href="images/10-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
											<img src="images/10.jpg" alt=" " class="img-responsive" />
										</a>
									  </div>
									  <div class="tab_list1">
										<a href="#">excepturi sint occaecati</a>
										<p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
									  </div>
									  <div class="clearfix"> </div>
									</div>
								</div>
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
									<div class="facts">
									  <div class="tab_list">
										<a href="images/8-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
											<img src="images/8.jpg" alt=" " class="img-responsive" />
										</a>
									  </div>
									  <div class="tab_list1">
										<a href="#">excepturi sint occaecati</a>
										<p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
									  </div>
									  <div class="clearfix"> </div>
									</div>
									<div class="facts">
									   <div class="tab_list">
										<a href="images/9-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
											<img src="images/9.jpg" alt=" " class="img-responsive" />
										</a>
									  </div>
									  <div class="tab_list1">
										<a href="#">excepturi sint occaecati</a>
										<p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
									  </div>
									  <div class="clearfix"> </div>
									</div>
									<div class="facts">
									   <div class="tab_list">
										<a href="images/10-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
											<img src="images/10.jpg" alt=" " class="img-responsive" />
										</a>
									  </div>
									  <div class="tab_list1">
										<a href="#">excepturi sint occaecati</a>
										<p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
									  </div>
									  <div class="clearfix"> </div>
									</div>
									<div class="facts">
									   <div class="tab_list">
										<a href="images/7-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
											<img src="images/7.jpg" alt=" " class="img-responsive" />
										</a>
									  </div>
									  <div class="tab_list1">
										<a href="#">excepturi sint occaecati</a>
										<p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
									  </div>
									  <div class="clearfix"> </div>
									</div>
								</div>
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
									<div class="facts">
									  <div class="tab_list">
										<a href="images/9-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
											<img src="images/9.jpg" alt=" " class="img-responsive" />
										</a>
									  </div>
									  <div class="tab_list1">
										<a href="#">excepturi sint occaecati</a>
										<p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
									  </div>
									  <div class="clearfix"> </div>
									</div>
									<div class="facts">
									   <div class="tab_list">
										<a href="images/10-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
											<img src="images/10.jpg" alt=" " class="img-responsive" />
										</a>
									  </div>
									  <div class="tab_list1">
										<a href="#">excepturi sint occaecati</a>
										<p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
									  </div>
									  <div class="clearfix"> </div>
									</div>
									<div class="facts">
									   <div class="tab_list">
										<a href="images/7-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
											<img src="images/7.jpg" alt=" " class="img-responsive" />
										</a>
									  </div>
									  <div class="tab_list1">
										<a href="#">excepturi sint occaecati</a>
										<p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
									  </div>
									  <div class="clearfix"> </div>
									</div>
									<div class="facts">
									   <div class="tab_list">
										<a href="images/8-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
											<img src="images/8.jpg" alt=" " class="img-responsive" />
										</a>
									  </div>
									  <div class="tab_list1">
										<a href="#">excepturi sint occaecati</a>
										<p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
									  </div>
									  <div class="clearfix"> </div>
									</div>
								</div>
							</div>
						 <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
							<script type="text/javascript">
								$(document).ready(function () {
									$('#horizontalTab').easyResponsiveTabs({
										type: 'default', //Types: default, vertical, accordion           
										width: 'auto', //auto or any width like 600px
										fit: true   // 100% fit in a container
									});
								});
							   </script>
						<link rel="stylesheet" href="css/swipebox.css">
						<script src="js/jquery.swipebox.min.js"></script> 
							<script type="text/javascript">
								jQuery(function($) {
									$(".swipebox").swipebox();
								});
							</script>
					</div>
					</div>
					<div class="newsletter">
						<h3>Na shkruani</h3>
						<form>
							<input type="text" value="Adresa e e-mailit" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}" required="">
							<input type="submit" value="Dergo">
						</form>
					</div>
					
						<div class="clearfix"> </div>
					</div>
					
				</div>
				<div class="clearfix"> </div>
			</div>
<!-- //blog -->
	</div>
<!-- //header-bottom -->
		</div>
	</div>
<!-- //banner-body -->

<!-- for bootstrap working -->
		<script src="js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
<div class="footer-bottom">
<div class="container">
			<p>© 2018 Quickly. All rights reserved | Design by <a href="/sie/web/index.php"> Adrion Library</a></p>
		</div>
</div>
</body>
</html>