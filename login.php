<html lang="en">
<head>
     <meta charset="utf-8" />
     <title>Log In</Title>
     </head>
     <body>
     <h1>Log In</h1>
    <br>
    <?php
		if(!empty($_SESSION['Logged In']) && !empty($_SESSION['Username']))
		{
			echo "You are logged in!";
		}
		else
		{
			echo "<li><a href=\"http://cscilab.bc.edu/~supannar/SignUp/Sign1/sign.html\">Log In</a></li>";
		}
	?>
 	<form name="loginform" id="loginform">
		<input type="text" 		name="createname" id="createname">Username</input><br>
		<input type="password" 	name="createpass" id="createpass">Password</input><br>
		<input type="submit" 	name="createuser" id="createuser" value="Log In" />
 	</form>
 </div>
  </body>
  </html>
  