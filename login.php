<?php
require_once "config.php";

if ( isset( $_SESSION['access_token'] ) ) {
	header( 'Location: index.php' );
	exit();
}

$redirectURL = "http://localhost/FBAlbum/Facebook-Album/fb-callback.php";
$permissions = [ 'email' ];
$loginURL    = $helper->getLoginUrl( $redirectURL, $permissions );
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css"/>
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Raleway:200,400,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/css/demo.css'>

    <link rel="stylesheet" href="css/back.css">

</head>
<body>
<div id="large-header" class="large-header">
    <canvas id="demo-canvas"></canvas>
    <h1 class="main-title">Connect <span class="thin" onclick="window.location = '<?php echo $loginURL ?>';"><i class="fa fa-facebook">acebook</i></span></h1>

</div>
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/EasePack.min.js'></script>
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/rAF.js'></script>
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/TweenLite.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
