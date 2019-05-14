<?php


if(isset($_POST['writeReview'])){
    require_once '../db.conf';
    
    $gameName = $_POST['gameName'];
    $pubYear = $_POST['pubYear'];
    $ESRb = $_POST['ESRb'];
    $developer = $_POST['developer'];
    $price = $_POST['price'];
    $publisher = $_POST['publisher'];
    $imageLocation = $_POST['imageLocation'];
 
    $platform = empty($_POST['platform']) ? '' : $_POST['platform'];
		$ratingNum = empty($_POST['gameRating']) ? '' : $_POST['gameRating'];
        $ratingDesc = empty($_POST['ratingDesc']) ? '' : $_POST['ratingDesc'];
    
    $a = 'available';

if (strpos($gameName, $a) !== false) {
    
}else{
    
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    $username = $_SESSION['loggedin'];
    $checkReview = $mysqli->query("SELECT username FROM Reviews WHERE username = '$username' AND gameTitle = '$gameName' AND platform = '$platform' ");
    
    if($checkReview->num_rows > 0) {
        $gameName = $gameName;
        $pubYear = $pubYear;
        $ESRb = $ESRb;
        $developer = $developer;
        $price = $price;
        $publisher = $publisher;
        $imageLocation = $imageLocation;

    } else {
        $query = "INSERT INTO Reviews(username, gameTitle, pubYear, ratingDesc, ratingNum, platform) VALUES ('$username', '$gameName', '$pubYear', '$ratingDesc', '$ratingNum', '$platform')";
        
        $gameName = $gameName;
        $pubYear = $pubYear;
        $ESRb = $ESRb;
        $developer = $developer;
        $price = $price;
        $publisher = $publisher;
        $imageLocation = $imageLocation;
        
        if ($mysqli->query($query) === TRUE) {
                
                $mysqli->close();
                $error = "Thank you for your review!";
                
            }
            else {
                $error = "Insertion error: " . $query . "<br>" . $mysqli->error;
            }
    }}}
    
    

?>