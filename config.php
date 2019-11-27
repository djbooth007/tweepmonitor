<?php
session_start();
require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

// Twitter API
$tw_consumerkey = '';
$tw_consumersecret = '';
$tw_access_token = "";
$tw_access_token_secret = "";
$tw_connection = new TwitterOAuth($tw_consumerkey, $tw_consumersecret, $tw_access_token, $tw_access_token_secret);


?>