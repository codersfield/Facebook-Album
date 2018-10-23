<?php

use Facebook\Facebook;

class FacebookService {
	private $fb;

	public function __construct() {
		try {
			$this->fb = new Facebook( [
				'app_id'                => getenv( "FB_APP_ID" ),
				'app_secret'            => getenv( "FB_APP_SECRET" ),
				'default_graph_version' => 'v3.1'
			] );
		} catch ( \Facebook\Exceptions\FacebookSDKException $e ) {
			// TODO handle error
		};
	}

	public function getRedirectHelper() {
		return $this->fb->getRedirectLoginHelper();
	}

	public function getLoginUrl() {
		$loginUrl = $this->getRedirectHelper()->getLoginUrl( getenv( "FB_REDIRECT_URI" ), [
			'email',
			'user_feed'
		] );

		return $loginUrl;
	}

	public function getOAuth2Client() {
		return $this->fb->getOAuth2Client();
	}

	public function getUser() {
		$requestFields = [
			"id",
			"first_name",
			"last_name",
			"email"
		];
		try {
			$response  = $this->fb->get( "/me?fields=" . implode( $requestFields, "," ), $_SESSION["access_token"] );
			$graphUser = $response->getGraphUser();

			return $graphUser;
		} catch ( \Facebook\Exceptions\FacebookSDKException $e ) {
			// response error
		}

		return null;
	}

	public function getFeed() {
		try {
			$response  = $this->fb->get( "/me/feed", $_SESSION["access_token"] );
			$graphNode = $response->getGraphNode();

			return $graphNode;
		} catch ( \Facebook\Exceptions\FacebookSDKException $e ) {
			// response error
		}

		return [];
	}
}
