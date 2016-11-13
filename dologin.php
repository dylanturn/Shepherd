<?php
if (isset($_POST['username']) && isset($_POST['password'])) {

        $useremail = $_POST['username'];
        $userpass = $_POST['password'];

        if((strlen($useremail) < 1) || (strlen($userpass) < 1)){
            header("Location: login.php?result=missing");
            exit();
        }

    try{
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
        $authResult = $auth->login($useremail,$userpass,FALSE);

        if ($authResult['error']==false) {
            setcookie("shepherd", $authResult['hash'],time()+60*15);
            header('Location: index.php');
            exit();

        } else {
            header("Location: login.php?result=failure&email=".$useremail);
            exit();
        }

    }catch(PDOException  $e ){
        header("Location: login.php?result=".$e);
        exit();
    } 
} else {
    header("Location: login.php?result=missing");
    exit();
}

?>