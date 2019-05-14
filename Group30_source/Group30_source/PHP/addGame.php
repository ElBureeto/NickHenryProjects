<!DOCTYPE html>
<html>
<head>
	<title>Add Game to Database</title>
	<link href="../CSS/websiteStyle.css" rel="stylesheet" type="text/css">
    <link href="jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <script src="jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
    
</head>
<body>
    <div id="loginWidget" class="ui-widget">
        <h1 class="ui-widget-header">Add Game to Database</h1>
        
        <?php
            if ($error) {
                print "<div class=\"ui-state-error\">$error</div>\n";
            }
        ?>
        
        <form name="createGameForm" action="createGame.php" method="POST" >
            
            <input type="hidden" name="action" value="do_create">
            
            <div class="stack">
                <label for="gameName">Game name:</label>
                <input type="text" id="gameName" name="gameName" class="ui-widget-content ui-corner-all" required>
            </div>
            
            <div class="stack">
                <label for="pubYear">Year Published:</label>
                <input type="text" id="pubYear" name="pubYear" class="ui-widget-content ui-corner-all" required>
            </div>
            
            <div class="stack">
                <label for="ESRb">ESRB Rating:</label>
                <input type="text" id="ESRb" name="ESRb" class="ui-widget-content ui-corner-all" required>
            </div>
            
            <div class="stack">
                <label for="developer">Developer:</label>
                <input type="test" id="developer" name="developer" class="ui-widget-content ui-corner-all" required>
            </div>
            
            <div class="stack">
                <label for="price">Price: $</label>
                <input type="text" id="price" name="price" class="ui-widget-content ui-corner-all" required>
            </div>
            
             <div class="stack">
                <label for="publisher">Publisher:</label>
                <input type="text" id="publisher" name="publisher" class="ui-widget-content ui-corner-all" required>
            </div>
            
            <div class="stack">
                <label for="imageLocation">Image Name:</label>
                <input type="text" id="imageLocation" name="imageLocation" class="ui-widget-content ui-corner-all" required>
            </div>
            
            
            <div class="stack">
                <input type="submit" value="Submit">
            </div>
        </form>
        <br>
        <div id="outputDiv"></div>
    </div>
</body>
</html>