<?php
require_once "config.php";

if ( ! isset( $_SESSION['access_token'] ) ) {
	header( 'Location: login.php' );
	exit();
}

$facebookUser = $facebookService->getUser();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <img src="<?php echo $facebookUser->getPicture()->getUrl() ?>" alt="<?php echo $facebookUser->getName(); ?>">
            <br>
            <br>
            <a class="btn btn-primary" href="/logout.php">
                Logout
            </a>
        </div>
        <div class="col-md-9">
            <table class="table table-hover table-bordered">
                <tbody>
                <tr>
                    <td>ID</td>
                    <td><?php echo $facebookUser->getId(); ?></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><?php echo $facebookUser->getFirstName(); ?></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><?php echo $facebookUser->getLastName(); ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $facebookUser->getEmail(); ?></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <!--Add loop here-->
		<?php
		$userFeed = $facebookService->getFeed();
		/*
		for ( $i = 2; $i < count( $_SESSION['userData']['posts'] ); $i ++ ) {
			$image = $_SESSION['userData']['posts'][ $i ]['full_picture'];
			print"<img src=\"$image\" width=\"300\" style=\"margin:50px\"  height=\"300\"\/>";

		}
		*/
		?>
    </div>
</div>
</body>
</html>
