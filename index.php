<!DOCTYPE html>

<?php
try{

  include("phpauth/Config.php");
  include("phpauth/Auth.php");

  $dnHost = getenv('MYSQL_HOST');
  $dbPort = getenv('MYSQL_PORT');
  $dbName = getenv('MYSQL_DATABASE');
  $username = getenv('MYSQL_USER');
  $password = getenv('MYSQL_PASSWORD');

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

  $sessionUserID = $auth->getSessionUID($_COOKIE["shepherd"]);
  $sessionUser = $auth->getUser($sessionUserID);
}catch(PDOException  $e ){
  echo "DB Error!";
} 
?>

<?php
  $styleArray = array();
  $menuArray = array();
  $menuTagArray = array();
  $phpFileArray = array();

  $dir = "packages/";
  $subDirList = scandir($dir,1);
  $subDirCount = count($subDirList);
  for ($x = 0; $x <= ($subDirCount); $x++) {

    $cssStyle = 'packages/'.$subDirList[$x].'/style.css';
    if (file_exists($cssStyle)) {
      $styleString = file_get_contents($cssStyle);
      array_push($styleArray, $styleString);
    }

    $menuItems = 'packages/'.$subDirList[$x].'/manifest.json';
    if (file_exists($menuItems)) {
      $menuJSON = file_get_contents($menuItems);
      $json = json_decode($menuJSON, true); // decode the JSON into an associative array
      $itemPos = $json['position'];
      $csstag = $json['tag'];
      $label = $json['label'];
      $menuHTML = "<a href=\"#\" class=\"w3-paddin\"><i id=\"".$csstag."\" class=\"fa sideMenuIcon fa-fw\"></i> ".$label."</a>";
      $menuArray[$itemPos] = $menuHTML;
      $menuTagArray[$itemPos] = $csstag;
      $phpFile = 'packages/'.$subDirList[$x].'/'.$csstag.'.php';
      $phpFileArray[$csstag] = $phpFile;
    }
  } 
?>

<html>
<title>Shepherd</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<style>
  html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
  #settings:before {
    content: "\f013";
  }
  <?php 
    for ($x = 0; $x <= count($styleArray); $x++) {
      echo $styleArray[$x];
    } 
  ?>
</style>

<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-container w3-top w3-black w3-large w3-padding" style="z-index:4">
  <button class="w3-btn w3-hide-large w3-padding-0 w3-hover-text-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-right">Shepherd</span>
</div>
<!-- END Top container -->

<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidenav"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="images/avatar.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8">
      <span>Welcome, <strong><?php echo $sessionUser['email']; ?></strong></span><br>
      <a href='dologout.php' style="margin-left:0px" class="w3-tiny w3-left-align w3-padding-tiny">logout</a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <br />

  <!--a href="#" class="w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a-->
  
  <?php 
    for ($x = 0; $x <= count($menuArray); $x++) {
      echo $menuArray[$x];
    } 
  ?>
  <a href="#" class="w3-paddin"><i id="settings" class="fa sideMenuIcon fa-fw"></i> Settings</a>
</nav>
<!-- END Sidenav/menu -->

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay">
</div>
<!-- END Overlay effect when opening sidenav on small screens -->

<!-- Page Content -->
<div id="webparts" class="w3-main w3-" style="margin-left:300px;margin-top:43px;">

  <!-- Page content goes in here! -->

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <p>Powered by cloud magic</p>
  </footer>
  <!-- END Footer -->
</div>
<!-- End Page Content -->

<script>
  // Get the Sidenav
  var mySidenav = document.getElementById("mySidenav");

  // Get the DIV with overlay effect
  var overlayBg = document.getElementById("myOverlay");

  // Toggle between showing and hiding the sidenav, and add overlay effect
  function w3_open() {
      if (mySidenav.style.display === 'block') {
          mySidenav.style.display = 'none';
          overlayBg.style.display = "none";
      } else {
          mySidenav.style.display = 'block';
          overlayBg.style.display = "block";
      }
  }

  // Close the sidenav with the close button
  function w3_close() {
      mySidenav.style.display = "none";
      overlayBg.style.display = "none";
  }

  $('#mySidenav a').click(function(e) {
    $("a.w3-blue").removeClass("w3-blue");
    $(e.target).addClass("w3-blue");
    var txt = $(e.target).text();
    $(webparts).empty();
    changeView(txt.toLowerCase().trim());
  });

  function changeView(newViewTag){
    http = new XMLHttpRequest();
    if(newViewTag=="settings"){
      http.open("GET", "settings.php", true);
    } else {
      http.open("GET", phpFileObj[newViewTag], true);
    }

    http.onreadystatechange=function() {
      if(http.readyState == 4) {
        $('#webparts').prepend(http.responseText);
      }
    }
    http.send(null);
  }

  var phpFileObj = JSON.parse('<?php echo json_encode($phpFileArray); ?>');
  $('#<?php echo $menuTagArray[1]?>').parent().addClass("w3-blue");
  changeView('<?php echo $menuTagArray[1]?>');

</script>
</body>
</html>
