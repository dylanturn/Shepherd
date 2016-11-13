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
  $authResult = $auth->checkSession($_COOKIE["shepherd"]);

  if(!$authResult){
    header("Location: login.php");
    exit();
  }
?>

<!-- Header -->
<header class="w3-container" style="padding-top:22px">
  <h5><b><i id="settings" class="fa"></i> Shepherd Settings</b></h5>
</header>
<!-- END Header -->

<!-- User List -->
<div class="w3-container">
  <h5>User Accounts</h5>
  <table id="clusterMembers" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <thead><th>User ID</th><th>Email Address</th><th>First Name</th><th>Last Name</th><th>Status</th></thead>
    <?php
      $query = $dbh->query("SELECT * FROM users");
      while($row = $query->fetch()) {
        echo "<tr>";
        echo "<td id=\"email\">".$row['id']."</td>";
        echo "<td id=\"email\">".$row['email']."</td>";
        echo "<td id=\"email\">firstname</td>";
        echo "<td id=\"email\">lastname</td>";
        echo "<td id=\"email\">".$row['isactive']."</td>";
        echo "</tr>";
      }
    ?>
  </table>
  <br>
</div>
<!-- END User List -->