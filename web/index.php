<?php
session_start();
/**
 * shfaq mesazhet e  checkout nese ka
 */
if (isset($_COOKIE['checkout_status'])) {
    $message = $_COOKIE['checkout_status'];
    setcookie('checkout_status', '', time() - 3600, '/');

}

include 'src/db_connect.php';
//merr librin nga databasa
$liberSql = "SELECT * from liber ORDER BY id DESC LIMIT 3";
$result = $conn->query($liberSql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Adrion Library</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Quickly Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- js -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
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
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
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
                                <?php if (!isset($_SESSION['usr_logged_in'])) { ?>
                                    <li><a href="login.php">Log-In </a>/</li>
                                    <li><a href="register.php">Regjistrohu</a></li>
                                <?php } else { ?>
                                    <li><a href="src/logout.php">Dil</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>

            <!-- search-scripts -->
            <script src="js/classie.js"></script>
            <script src="js/uisearch.js"></script>
            <script>
                new UISearch(document.getElementById('sb-search'));
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
            <div class="clearfix"></div>
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

                <?php if(isset($message)){?>
                <div class="alert alert-warning">
                    <?php echo $message; ?>
                </div>
<?php }?>
                <!--//End-slider-script -->
                <div id="top" class="callbacks_container wow fadeInUp" data-wow-delay="0.5s">
                    <ul class="rslides" id="slider3">
                        <li>
                            <div class="banner-inf">
                                <h3></h3>
                                <p>Nje nga zgjidhjet me te mira per te kaluar kohen tuaj te lire. </br> Zgjidhni librat
                                    Adrion.</p>

                            </div>
                        </li>
                        <li>
                            <div class="banner-inf">
                                <h3>Librat qe ofrohen</h3>
                                <p><strong>Adrion</strong>- Mundesia me e mire per te gjetur ate qe kerkoni. Ne ofrojme
                                    nje game te gjere librash te kategorive te ndryshme duke perfshire novela, romane,
                                    libra arti, guida, si edhe libra mbi historine dhe artin. Tek ne gjithashtu mund te
                                    gjeni katrolina te vjetra bardhe e zi. </p>

                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- //banner -->
            <!-- banner-bottom -->
            <div class="banner-bottom">
                <h1 class="custom-header-kat-home">Librat Me Te Fundit</h1>
                <ul id="flexiselDemo1">
                    <?php while ($libri = $result->fetch_assoc()) { ?>
                        <li>
                            <div class="banner-bottom-grid">
                                <img src="../Theme/imazhe/<?php echo $libri['liber_image'] ?>" alt=" " width="190px"
                                     height="286px"/>
                                <p><?php echo $libri['description'] ?></p>
                                <span style="margin-bottom: 15px;display:block; color: #C34C21;"><b><i><?php echo $libri['title'] ?></i></b></span>
                                <div class="more">
                                    <a href="single.php?bookId=<?php echo $libri['id'] ?>"
                                       style="width:200px; padding-top: 15px;"
                                       class="hvr-bounce-to-bottom sint">Lexo me teper</a>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
                <script type="text/javascript">
                    $(window).load(function () {
                        $("#flexiselDemo1").flexisel({
                            visibleItems: 3,
                            animationSpeed: 1000,
                            autoPlay: false,
                            autoPlaySpeed: 3000,
                            pauseOnHover: true,
                            enableResponsiveBreakpoints: true,
                            responsiveBreakpoints: {
                                portrait: {
                                    changePoint: 480,
                                    visibleItems: 1
                                },
                                landscape: {
                                    changePoint: 640,
                                    visibleItems: 2
                                },
                                tablet: {
                                    changePoint: 768,
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
                    KETU BEJ DICKA SA PER DESIGN
                </div>
                <div class="blog-right">
                    <div class="sap_tabs">
                        <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                            <ul class="resp-tabs-list">
                                <li class="resp-tab-item grid2" aria-controls="tab_item-1" role="tab">
                                    <span>Te fundit</span></li>
                                <div class="clear"></div>
                            </ul>
                            <div class="resp-tabs-container">
                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                                    <div class="facts">
                                        <div class="tab_list">
                                            <a href="images/8-.jpg" class="b-link-stripe b-animate-go   swipebox"
                                               title="">
                                                <img src="images/8.jpg" alt=" " class="img-responsive"/>
                                            </a>
                                        </div>
                                        <div class="tab_list1">
                                            <a href="#">excepturi sint occaecati</a>
                                            <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="facts">
                                        <div class="tab_list">
                                            <a href="images/9-.jpg" class="b-link-stripe b-animate-go   swipebox"
                                               title="">
                                                <img src="images/9.jpg" alt=" " class="img-responsive"/>
                                            </a>
                                        </div>
                                        <div class="tab_list1">
                                            <a href="#">excepturi sint occaecati</a>
                                            <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="facts">
                                        <div class="tab_list">
                                            <a href="images/10-.jpg" class="b-link-stripe b-animate-go   swipebox"
                                               title="">
                                                <img src="images/10.jpg" alt=" " class="img-responsive"/>
                                            </a>
                                        </div>
                                        <div class="tab_list1">
                                            <a href="#">excepturi sint occaecati</a>
                                            <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="facts">
                                        <div class="tab_list">
                                            <a href="images/7-.jpg" class="b-link-stripe b-animate-go   swipebox"
                                               title="">
                                                <img src="images/7.jpg" alt=" " class="img-responsive"/>
                                            </a>
                                        </div>
                                        <div class="tab_list1">
                                            <a href="#">excepturi sint occaecati</a>
                                            <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                                        </div>
                                        <div class="clearfix"></div>
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
                                jQuery(function ($) {
                                    $(".swipebox").swipebox();
                                });
                            </script>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>

            </div>
            <div class="clearfix"></div>
        </div>
        <!-- //blog -->
    </div>
    <!-- //header-bottom -->
</div>
</div>
<!-- //banner-body -->

<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<div class="footer-bottom">
    <div class="container">
        <p>© 2018 All rights reserved | Design by <a href="/sie/web/index.php"> Adrion Library</a></p>
    </div>
</div>
</body>
</html>