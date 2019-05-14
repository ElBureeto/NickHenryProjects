<?php
    if ($_SERVER['HTTPS'] !== 'on') {
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirectURL");
		exit;
	}
	
	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}

	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		header("Location: test.php");
		exit;
	}
	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];

	if ($action == 'do_create') {
		create_user();
	} else {
		login_form();
	}
	
	function create_user() {
		$firstName = empty($_POST['firstName']) ? '' : $_POST['firstName'];
		$lastName = empty($_POST['lastName']) ? '' : $_POST['lastName'];
        $username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
        $confirmPass = empty($_POST['confirmPass']) ? '' : $_POST['confirmPass'];
		$birthday = empty($_POST['birthday']) ? '' : $_POST['birthday'];
        $email = empty($_POST['email']) ? '' : $_POST['email'];
    
    
        
        if(strcmp($password, $confirmPass) == 0){
           // Require the credentials
            require_once '../db.conf';

            // Connect to the database
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
            $password = sha1($password);
            // Build query
            $query = "INSERT INTO User(username, password, bdate, email, fname, lname) VALUES ('$username', '$password', STR_TO_DATE('$birthday', '%Y-%m-%d'), '$email',  '$firstName', '$lastName')";

            if ($mysqli->query($query) === TRUE) {
                
                $mysqli->close();
                $error = "New User Creation Success!";

                require "Index.php";
                exit;
            }
            else {
                $error = "Insertion error: " . $query . "<br>" . $mysqli->error;
                require "createUser_form.php";
                exit;
            }
        } 

        else {
          $error = 'Error: Passwords do not match!.';
          require "createUser_form.php";
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