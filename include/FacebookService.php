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

	public function getLoginHelper() {
		return $this->fb->getRedirectLoginHelper();
	}

	public function getLoginUrl() {
		$loginUrl = $this->getLoginHelper()->getLoginUrl( getenv( "FB_REDIRECT_URI" ), [
			'email'
		] );


		return $loginUrl;
	}
}
