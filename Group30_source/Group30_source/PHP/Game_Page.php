<?php
    if ($_SERVER['HTTPS'] !== 'on') {
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirectURL");
		exit;
	}
	
	// http://us3.php.net/manual/en/function.session-start.php
	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}
	
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
    $_SESSION['cart'] = 0;
	
	if ($loggedIn) {
		header("Location: test.php");
		exit;
	}
	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_login') {
		handle_login();
	} else {
		login_form();
	}
	
	function handle_login() {
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];

        require_once '../db.conf';
        
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
        // Check for errors
        if ($mysqli->connect_error) {
            $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
			require "Index.php";
            exit;
        }
        
        // http://php.net/manual/en/mysqli.real-escape-string.php
        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);
        
        //more secure password storing for website
        $password = sha1($password);
        // Build query
		$query = "SELECT username FROM User WHERE username = '$username' AND password ='$password'";

		$mysqliResult = $mysqli->query($query);
		
        // If there was a result...
        if ($mysqliResult) {
            $match = $mysqliResult->num_rows;

            $mysqliResult->close();
            // Close the DB connection
            $mysqli->close();


            // If there was a match, login
  		    if ($match == 1) {
                $_SESSION['loggedin'] = $username;
                header("Location: test.php");
                exit;
            }
            else {
                $error = 'Error: Incorrect username or password';
                require "Index.php";
                exit;
            }
        }
        // Else, there was no result
        else {
          $error = 'Login Error: Please contact the system administrator.';
          require "Index.php";
          exit;
        }
	}
	
	function login_form() {
		$username = "";
		$error = "";
		require "Index.php";
        exit;
	}
	
?>