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

    </head>
    
    <body>
        <?php require 'header.php'; ?>
        <br  />
        <h1 class="header">About the Meme Lord</h1>
        
        <div>
            <div id="hunterContainer"><img src="../Images/HunterAlbum.jpg" alt="Hunter" id="hunter"></div>
            <p class="generalInfo">Hunter Johnson is a Junior at the University of Missouri, Columbia. He is a Biochemistry major getting minors in Computer Science, Mathematics and Biology. He decided to create a site that he has always wanted, a site where one could come and buy games in a central location, a hub for games if you will. In Hunter's free time he enjoys to cook, however he is not very skilled...<br></p>
            <div id="hunterContainer"></div>
                <p class="generalInfo">This website was created as the final project for CS3380 with Professor Lin's fall semester 2018. The project uses HTML5, CSS3, JavaScript, JQuery, JQuery UI and php. The database was created using mysql and holds the basic information collected when users sign up, information on games, reviews and merch. KEy contraints were implemented and all basic query functions are implemented as well as using more complicated tasks like AVG, LIMIT, ORDER BY etc.</p>
        </div>    
    </body>
    <?php require 'footer.php'; ?>
</html>