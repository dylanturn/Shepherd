<?php
  include("phpauth/Config.php");
  include("phpauth/Auth.php");

  $dnHost = getenv('MYSQL_HOST');
  $dbPort = getenv('MYSQL_PORT');
  $dbName = getenv('MYSQL_DATABASE');
  $username = getenv('MYSQL_USER');
  $password = getenv('MYSQL_PASSWORD');

  $dsn = 'mysql:host='.$dnHost.';port='.$dbPort.';dbname='.$dbName.'';
  $dbh = new PDO($dsn, $username, $password);
  $config = new PHPAuth\Config($dbh);
  $auth   = new PHPAuth\Auth($dbh, $config);
  $sessionUserID = $auth->getSessionUID($_COOKIE["shepherd"]);
  $sessionUser = $auth->getUser($sessionUserID);
  $authResult = $auth->logout($_COOKIE["shepherd"]);
  if($authResult){
    header("Location: login.php?email=".$sessionUser['email']);
    exit();
  } else {
    header("Location: login.php");
    exit();
  }
?>