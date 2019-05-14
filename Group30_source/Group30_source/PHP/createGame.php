<?php

	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];

	if ($action == 'do_create') {
		create_game();
	} else {
		require 'test.php';
        exit;
	}
	
	function create_game() {
		$gameName = empty($_POST['gameName']) ? '' : $_POST['gameName'];
		$pubYear = empty($_POST['pubYear']) ? '' : $_POST['pubYear'];
        $ESRb = empty($_POST['ESRb']) ? '' : $_POST['ESRb'];
		$developer = empty($_POST['developer']) ? '' : $_POST['developer'];
        $price = empty($_POST['price']) ? '' : $_POST['price'];
		$publisher = empty($_POST['publisher']) ? '' : $_POST['publisher'];
        $imageLocation = empty($_POST['imageLocation']) ? '' : $_POST['imageLocation'];
    
    

           // Require the credentials
            require_once '../db.conf';

            // Connect to the database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            // Check for errors
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                require "admin.php";
                exit;
            }


            // Build query
            $query = "INSERT INTO Games(gameName, pubYear, ESRb, developer, price, publisher, imageLocation) VALUES ('$gameName', '$pubYear', '$ESRb', '$developer',  '$price', '$publisher', '$imageLocation')";

            if ($mysqli->query($query) === TRUE) {
                
                $mysqli->close();
                $error = "New Game Creation Success!";

                require "admin.php";
                exit;
            }
            else {
                $error = "Insertion error: " . $query . "<br>" . $mysqli->error;
                require "admin.php";
                exit;
            }

        }

	
?>