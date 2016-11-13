<?php
include("phpauth/Config.php");
include("phpauth/Auth.php");

$dbName="shepherd_phpauth";
$username='shepherd_admin';
$password='sh3pherdp@ss!!';

if (isset($_POST['username']) && isset($_POST['password'])) {

        $useremail = $_POST['username'];
        $userpass = $_POST['password'];

        if((strlen($useremail) < 1) || (strlen($userpass) < 1)){
            header("Location: login.php?result=missing");
            exit();
        }

    try{
        $dsn = 'mysql:host=192.241.150.115;port=32776;dbname=phpauth';
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