<!-- Login Form -->
<html>
    
<title>Shepherd</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
    .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
    }
    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    .form input {
        font-family: "Raleway", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }
    .form button {
        font-family: "Raleway", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }
    .form button:hover,.form button:active,.form button:focus {
        background: #43A047;
    }
    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }
    .form .message a {
        color: #4CAF50;
        text-decoration: none;
    }
    .form .register-form {
        display: none;
    }
    .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
    }
    .container:before, .container:after {
        content: "";
        display: block;
        clear: both;
    }
    .container .info {
        margin: 50px auto;
        text-align: center;
    }
    .container .info h1 {
        margin: 0 0 15px;
        padding: 0;
        font-size: 36px;
        font-weight: 300;
        color: #1a1a1a;
    }
    .container .info span {
        color: #4d4d4d;
        font-size: 12px;
    }
    .container .info span a {
        color: #000000;
        text-decoration: none;
    }
    .container .info span .fa {
        color: #EF3B3A;
    }
    body {
        font-family: "Raleway", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;      
    }   
</style>

<?php
    $loginFailureMessage = '';
    if (isset($_GET['result'])) {
        
        if($_GET['result']=="failure"){
            $loginFailureMessage="<p class=\"message\">Invalid username or password.</p>";
        }
        else if($_GET['result']=="missing"){
            $loginFailureMessage="<p class=\"message\">Please enter a username and password.</p>";
        }   
        else{
            $loginFailureMessage="<p class=\"message\">".$_GET['result']."</p>";
        }
    }
    $useremail='';
    if (isset($_GET['email'])) {
        $useremail = $_GET['email'];
    }
?>

<script>
$(document).ready(function() {
    $('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
});
</script>

<body>
    <!-- Top container -->
    <div class="w3-container w3-top w3-black w3-large w3-padding" style="z-index:4">
        <span class="w3-right">Shepherd</span>
    </div>
    <!-- END Top container -->

    <div class="login-page">
        <div class="form">
            <form class="register-form" name="login" method="post" action="dologin.php">
                <input type="text" placeholder="email address"/>
                <button>reset</button>
                <p class="message"><a id="asdf"  href="#">Go Back</a></p>
            </form>
            <form class="login-form"  name="login" method="post" action="dologin.php">
                <?php 
                    if(strlen($useremail)>0){
                        echo "<input type=\"text\" name=\"username\" placeholder=\"".$useremail."\"/>";
                    } else {
                        echo "<input type=\"text\" name=\"username\" placeholder=\"usernam\"/>";
                    }
                ?>
                <input type="password" name="password" placeholder="password"/>
                <button type="submit" name="submit">login</button>
                <p class="message"><a id="asdf"  href="#">Reset Password</a></p>
                <?php echo $loginFailureMessage; ?>
            </form>
        </div>
    </div>
</body>
</html>
<!-- End Login Form -->