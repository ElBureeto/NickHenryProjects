<?php
    session_start();
    require_once '../db.conf';   
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    
    $search = $_SESSION['gameName'];
    //We'll get a set of attributes back
    $resultSet = $mysqli->query("SELECT * FROM Reviews WHERE gameTitle = '$search' ORDER BY ratingNum DESC LIMIT 6");
    
    if($resultSet->num_rows > 0){
        //loop through the set to assign values to variables
        while($rows = $resultSet->fetch_assoc())
        {
            $username = $rows['username'];
            $platform = $rows['platform'];
            $ratingDesc = $rows['ratingDesc'];
            $ratingNum = $rows['ratingNum'];
            
             echo   "<div class='review'>
                    <div>$username</div>
                    <div>$platform</div>
                    <div>$ratingNum/5</div>
                    <div>Original Review:<br>$ratingDesc</div>
                </div>";
            
        }
    }
    else{
        echo $search;
    }
        

?>
