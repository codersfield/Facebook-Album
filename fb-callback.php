<?php
require_once "config.php";

$helper = $facebookService->getRedirectHelper();
try {

	$accessToken = $helper->getAccessToken();
} catch ( \Facebook\Exceptions\FacebookResponseException $e ) {
	echo "Response Exception: " . $e->getMessage();
	exit();
} catch ( \Facebook\Exceptions\FacebookSDKException $e ) {
	echo "SDK Exception: " . $e->getMessage();
	exit();
}

if ( ! $accessToken ) {
	header( 'Location: login.php' );
	exit();
}

$oAuth2Client = $facebookService->getOAuth2Client();
if ( ! $accessToken->isLongLived() ) {
	try {
		$accessToken              = $oAuth2Client->getLongLivedAccessToken( $accessToken );
		$_SESSION['access_token'] = (string) $accessToken->getValue();
		header( "Location:index.php" );
		exit;
	} catch ( \Facebook\Exceptions\FacebookSDKException $e ) {
		// Unable to get long-lived token
	}
}
