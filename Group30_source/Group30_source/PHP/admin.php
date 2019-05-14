<!DOCTYPE html>
<html>

    <head>
	<title>Login</title>
	<link href="../CSS/websiteStyle.css" rel="stylesheet" type="text/css">
    <link href="jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <style>
            body {
                width: 100%;
                height: auto;
                background-size: cover;
            }
            a {
                color: #000;
            }
        </style>
    <script src="jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
    <script>
        $(function(){
            $("input[type=submit]").button();
        });
    </script>
</head>
<body>
    <div id="loginWidget" class="ui-widget">
        <h1 class="ui-widget-header">SELECT ACTION</h1>
        
        <?php
            if ($error) {
                print "<div class=\"ui-state-error\"> $error</div>\n";
            }
        ?>
        
        <div>

            
            <div class="stack">
                <a href="addGame.php">Add Game to Database</a>
            </div>
            
            <div><a href="test.php">Return to Site</a></div>
        
        </div>
    
        
    </div>
</body>
</html>