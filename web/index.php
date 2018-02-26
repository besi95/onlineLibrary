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
//merr 3 librat e fundit nga databasa
$liberSql = "SELECT * from liber ORDER BY id DESC LIMIT 3";
$result = $conn->query($liberSql);

//merr 5 librat e fundit nga databasa
$liber5Sql = "SELECT * from liber ORDER BY RAND() DESC LIMIT 3";
$result5 = $conn->query($liber5Sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Adrion Library</title>
    <link rel="shortcut icon" type="image/png" href="images/icon.png"/>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
                            <?php if (isset($_SESSION['usr_logged_in'])) { ?>
                                <li class="hvr-bounce-to-bottom"><a href="blerjet.php">Blerjet e Mia</a></li>
                            <?php } ?>
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

                <?php if (isset($message)) { ?>
                    <div class="alert alert-warning">
                        <?php echo $message; ?>
                    </div>
                <?php } ?>
                <!--//End-slider-script -->
                <div id="top" class="callbacks_container wow fadeInUp" data-wow-delay="0.5s">
                    <ul class="rslides" id="slider3">
                        <li>
                            <div class="banner-inf">
                                <h3>Lehtesi</h3>
                                <p><strong>Adrion</strong>- Nje nga zgjidhjet me te mira per te kaluar kohen tuaj te
                                    lire. </br> Zgjidhni librat
                                    me te fundit ne Adrion dhe sdo te mbeteni te zhgenjyer. Tek ne do te gjeni libra
                                    te kategorive te ndryshme dhe me nje dergese tek ju ne kohe rekord.</p>

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
                                <img class="img-rounded" src="../admin/imazhe/<?php echo $libri['liber_image'] ?>"
                                     alt=" " width="190px" height="286px"/>
                                <p style="text-align: justify"><?php echo substr($libri['description'],0,270).' ...' ?></p>
                                <span class="styled-title"
                                      style="margin-bottom: 25px;display: block"><b><i><?php echo $libri['title'] ?></i></b></span>
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
                    <blockquote class="quote-box quote-box2">
                        <p class="quotation-mark">
                            “
                        </p>
                        <p class="quote-text">
                            It is what you read when you don’t have to that determines what you will be when you can’t
                            help it.
                        </p>
                        <hr>
                        <div class="blog-post-actions">
                            <p class="blog-post-bottom pull-left">
                                – Oscar Wilde </p>
                        </div>
                    </blockquote>
                    <blockquote class="quote-box quote-box2">
                        <p class="quotation-mark">
                            “
                        </p>
                        <p class="quote-text">
                            Great books help you understand, and they help you feel understood.
                        </p>
                        <hr>
                        <div class="blog-post-actions">
                            <p class="blog-post-bottom pull-left">
                                – John Green </p>
                        </div>
                    </blockquote>
                </div>
                <div class="blog-right">
                    <div class="sap_tabs">
                        <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                            <ul class="resp-tabs-list">
                                <li class="resp-tab-item grid2" aria-controls="tab_item-1" role="tab">
                                    <span>Sugjerime</span></li>
                                <div class="clear"></div>
                            </ul>
                            <div class="resp-tabs-container">
                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                                    <?php while ($item = $result5->fetch_assoc()) { ?>
                                        <div class="facts">
                                            <div class="tab_list">
                                                <a href="../admin/imazhe/<?php echo $item['liber_image'] ?>"
                                                   class="b-link-stripe b-animate-go swipebox"
                                                   title="">
                                                    <img width="100px"
                                                         src="../admin/imazhe/<?php echo $item['liber_image'] ?>"
                                                         alt=" " class=" img-rounded"/>
                                                </a>
                                            </div>
                                            <div class="tab_list1">
                                                <a href="single.php?bookId=<?php echo $item['id'] ?>"><?php echo $item['title'] ?></a>
                                                <p><?php echo $item['published_on'] ?>
                                                    <span><?php echo substr($item['description'], 0, 100) . ' ...' ?></span>
                                                </p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    <?php } ?>
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
        <p>© 2018 All rights reserved | Design by <a href="#"> Adrion Library</a></p>
    </div>
</div>
</body>
</html>