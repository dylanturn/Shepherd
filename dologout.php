<?php
  include("phpauth/Config.php");
  include("phpauth/Auth.php");

  $dnHost = $_SERVER['MYSQL_HOST'];
  $dbPort = $_SERVER['MYSQL_PORT'];
  $dbName = $_SERVER['MYSQL_DATABASE'];
  $username = $_SERVER['MYSQL_USER'];
  $password = $_SERVER['MYSQL_PASSWORD'];

  #$dnHost='192.168.1.135';
  #$dbPort='32776';
  #$dbName='shepherd_phpauth';
  #$username='shepherd_admin';
  #$password='sh3pherdp@ss!!';

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