<?php

    if ($_SERVER['HTTPS'] !== 'on') {
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirectURL");
		exit;
	}

	if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: login.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Becomeme Home</title>
        <link href="../CSS/headerStyle.css" rel="stylesheet" type="text/css">
        <script>
    
        function search(gameName){
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("gameTitle").innerHTML=this.responseText;
                }
            };
            xmlhttp.open("GET", "loadGamePageInfo.php?hashString="+gameName,true);
            xmlhttp.send();
        }
        
    </script>
    </head>
    
    <body>
        <?php require 'header.php'; ?>
        <br />
        <h1 id="gameTitle">Contact the Meme Lord</h1>
        <div>
            <p class="generalInfo">Site Manager: Hunter Johnson<br>Email: hjvd6@mail.missouri.edu<br>Phone: 1-888-4-VAULT-TEC<br>FAX: It's 2018, nobody uses this anymore<br></p>
        </div>
        
    </body>
    <?php require 'footer.php'; ?>
</html>