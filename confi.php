<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('160179236104-4286n4e9n10etfuqaun39e5c7mnpe3m2.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/quantum/');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?> 