<?php
    session_start();
    require_once '../db.conf';   
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    
    $search = $_SESSION['gameName'];

    $query = "SELECT AVG(ratingNum) as total FROM Reviews WHERE gameTitle='$search' AND platform='PC'";

    $result = $mysqli->query($query);
    $row=$result->fetch_assoc();
    $ratingPC = substr($row['total'], 0, 3);

    $query = "SELECT AVG(ratingNum) as total FROM Reviews WHERE gameTitle='$search' AND platform='Xbox'";

    $result = $mysqli->query($query);
    $row=$result->fetch_assoc();
    $ratingXbox = substr($row['total'], 0, 3);

    $query = "SELECT AVG(ratingNum) as total FROM Reviews WHERE gameTitle='$search' AND platform='Playstation'";

    $result = $mysqli->query($query);
    $row=$result->fetch_assoc();
    $ratingPS4 = substr($row['total'], 0, 3);


    echo "<div class='platformRatings'>
                <div>
                    <img class='platformLogo' src='../Images/PC.png' alt='PC'>
                    <div> $ratingPC / 5.0</div>
                </div>
                <div>
                    <img class='platformLogo'  src='../Images/XBOX.jpg' alt='XBOX'>
                    <div> $ratingXbox / 5.0</div>
                </div>
                <div>
                    <img class='platformLogo'  src='../Images/PS4.jpg' alt='PS4'>
                    <div> $ratingPS4 / 5.0</div>
                </div>
            </div>";
?>