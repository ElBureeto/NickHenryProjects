<!DOCTYPE html>
<html>
<head>
	<title>Create User Account</title>
	<link href="../CSS/websiteStyle.css" rel="stylesheet" type="text/css">
    <link href="jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <script src="jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
    <script>
        $(function(){
            $("input[type=submit]").button();			
            $("#password, #confirmPass").keyup(function(){
                var password = $("#password").val();
                var confirmPass = $("#confirmPass").val();
                
                if(password.localeCompare(confirmPass) != 0){
                    $("#outputDiv").html("Passwords Do Not Match!");
                    document.getElementById("confirmPass").setCustomValidity("Passwords Do Not Match!");
                }
                else{
                    $("#outputDiv").html("Passwords Match!");
                    document.getElementById("confirmPass").setCustomValidity("");
                }
            });
        });
    </script>
</head>
<body>
    <div id="loginWidget" class="ui-widget">
        <h1 class="ui-widget-header">Create your Account</h1>
        
        <?php
            if ($error) {
                print "<div class=\"ui-state-error\">$error</div>\n";
            }
        ?>
        
        <form name="createUserForm" action="createUser.php" method="POST" >
            
            <input type="hidden" name="action" value="do_create">
            
            <div class="stack">
                <label for="firstName">First name:</label>
                <input type="text" id="firstName" name="firstName" class="ui-widget-content ui-corner-all" required>
            </div>
            
            <div class="stack">
                <label for="lastName">Last name:</label>
                <input type="text" id="lastName" name="lastName" class="ui-widget-content ui-corner-all" required>
            </div>
            
            <div class="stack">
                <label for="username">User name:</label>
                <input type="text" id="username" name="username" class="ui-widget-content ui-corner-all" required>
            </div>
            
            <div class="stack">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="ui-widget-content ui-corner-all" required>
            </div>
            
            <div class="stack">
                <label for="confirmPass">Confirm Password:</label>
                <input type="password" id="confirmPass" name="confirmPass" class="ui-widget-content ui-corner-all" required>
            </div>
            
             <div class="stack">
                <label for="birthday">Birthday:</label>
                <input type="date" id="birthday" name="birthday" class="ui-widget-content ui-corner-all" required>
            </div>
            
            <div class="stack">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="ui-widget-content ui-corner-all" required>
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