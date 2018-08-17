<?php
	session_start();

	require_once "Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => 'Your_App_ID',
		'app_secret' => 'Your_Secret_Key',
		'default_graph_version' => 'v3.1'
	]);

	$helper = $FB->getRedirectLoginHelper();
?>
