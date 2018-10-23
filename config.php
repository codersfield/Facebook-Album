<?php

use Dotenv\Dotenv;

if ( session_status() === PHP_SESSION_NONE ) {
	session_start();
}

require_once "vendor/autoload.php";

$dotenv = new Dotenv( __DIR__ );
$dotenv->load();

require_once "include/FacebookService.php";
$facebookService = new FacebookService();
