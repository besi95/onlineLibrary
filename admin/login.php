<?php
session_start();
if(isset($_COOKIE['login_error'])){
    $message = $_COOKIE['login_error'];
    setcookie('login_error','',time()-3600,'/');

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/png" href="../web/images/icon.png"/>

    <title>LIBRARIA - LOGIN</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>

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

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->

<div id="login-page">
    <div class="container">

        <form class="form-login" method="post" action="src/admin_login.php">
            <h2 class="form-login-heading">ADMIN LOGIN</h2>
            <div class="login-wrap">
                <?php if(isset($message)){?>
                <span style="color: red;"><?php echo $message?></span>
                <?php } ?>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <br>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <br><br>
                <button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> LOG
                    IN
                </button>
                <hr>
            </div>
        </form>

    </div>
</div>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
<script>
    $.backstretch("assets/img/background.jpg", {speed: 500});
</script>


</body>
</html>
