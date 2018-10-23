<?php
require_once "config.php";

if ( ! isset( $_SESSION['access_token'] ) ) {
	header( 'Location: login.php' );
	exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <img src="<?php echo $_SESSION['userData']['picture']['url'] ?>">
            <br>
            <br>
            <button type="button" class="btn btn-primary"><a href="logout.php">
                    Log out</a>
            </button>
        </div>
        <div class="col-md-9">
            <table class="table table-hover table-bordered">
                <tbody>
                <tr>
                    <td>ID</td>
                    <td><?php echo $_SESSION['userData']['id'] ?></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><?php echo $_SESSION['userData']['first_name'] ?></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><?php echo $_SESSION['userData']['last_name'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $_SESSION['userData']['email'] ?></td>
                </tr>

                </tbody>
            </table>
        </div>
        <!--Add loop here-->
		<?php
		for ( $i = 2; $i < count( $_SESSION['userData']['posts'] ); $i ++ ) {
			$image = $_SESSION['userData']['posts'][ $i ]['full_picture'];
			print"<img src=\"$image\" width=\"300\" style=\"margin:50px\"  height=\"300\"\/>";

		}
		?>

    </div>
</div>
</body>
</html>
