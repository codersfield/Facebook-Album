<?php
session_start();

require_once "vendor/autoload.php";

try {
	$FB = new \Facebook\Facebook( [
		'app_id'                => '806834059419905',
		'app_secret'            => '88863b2c7c655405a574193d75350e75',
		'default_graph_version' => 'v3.1'
	] );
} catch ( \Facebook\Exceptions\FacebookSDKException $e ) {
	// should handle error
}

$helper = $FB->getRedirectLoginHelper();
