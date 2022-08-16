<?php
  require_once 'vendor/autoload.php';

  $clientID = '285966220275-16vua5nqt9mlk6msucn46a01fpj0qicc.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost/internacionalizacion/internacionalizacion/seleccion_modulos.php';

  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");

 
?>