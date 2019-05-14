<?php
session_start();
/*THIS IS HOW WE WILL DISPLAY OUR SEARCH*/
if(isset($_POST['submit'])){
    require_once '../db.conf';
        
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    //prevents sql injections
    $password = $mysqli->real_escape_string($_POST['search']);
    $username = $_SESSION['loggedin'];
    //We'll get a set of attributes back
    $resultSet = $mysqli->query("UPDATE User SET password = '$password' WHERE username = '$username'");
    require 'test.php'; 
    exit;
    
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link href="../CSS/websiteStyle.css" rel="stylesheet" type="text/css">
    <link href="jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <script src="jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
    
</head>
<body>
    <div id="loginWidget" class="ui-widget">
        <h1 class="ui-widget-header">Change Password</h1>
        
        <?php
            if ($error) {
                print "<div class=\"ui-state-error\">$error</div>\n";
            }
        ?>
        
        
        <form method="POST">
            <input type="TEXT" name="search" />
            <input type="submit" name="submit" value = "Change Password" />
        </form>
        <div><a href="test.php">Return to Site</a></div>
        

        <br>
        <div id="outputDiv"></div>
    </div>
</body>
</html>