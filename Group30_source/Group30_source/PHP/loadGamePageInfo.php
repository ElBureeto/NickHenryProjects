<?php
/*THIS IS HOW WE WILL DISPLAY OUR SEARCH*/
if(isset($_POST['submit'])){
    require_once '../db.conf';
        
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    //prevents sql injections
    $search = $mysqli->real_escape_string($_POST['gameName']);
    //We'll get a set of attributes back
    $resultSet = $mysqli->query("SELECT * FROM Games WHERE gameName = '$search'");
    
    if($resultSet->num_rows > 0){
        //loop through the set to assign values to variables
        while($rows = $resultSet->fetch_assoc())
        {
            $gameName = $rows['gameName'];
            $pubYear = $rows['pubYear'];
            $ESRb = $rows['ESRb'];
            $developer = $rows['developer'];
            $price = $rows['price'];
            $publisher = $rows['publisher'];
            $imageLocation = $rows['imageLocation'];
        }
    }else{
        $gameName = "$search is not available.";
        $pubYear = "N/A";
        $ESRb = "N/A";
        $developer = "N/A";
        $price = "0";
        $publisher = "N/A";
        $imageLocation = "NA.gif";
    }
}
?>

