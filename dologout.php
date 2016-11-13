<?php
  include("phpauth/Config.php");
  include("phpauth/Auth.php");

  $username='shepherd_admin';
  $password='sh3pherdp@ss!!';
  
  $dsn = 'mysql:host=192.241.150.115;port=32776;dbname=phpauth';
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