<?php session_start(); ?>
<html lang="en">
<head>
     <meta charset="utf-8" />
     <title>Log In</Title>
     </head>
     <body>
     <h1>Log In</h1>
    <br>
    <?php
		if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
		{
			echo "You are logged in!";
		}
		elseif(!empty($_POST['username']) && !empty($_POST['password']))
		{ 
			$db = mysqli_connect('localhost', 'noschese', 'npEN4yQJ', 'noschese') or die("Unable to connect");
			$user = mysqli_real_escape_string($db, $_POST['username']);
			$pass = mysqli_real_escape_string($db, $_POST['password']);
			$login = mysqli_query($db, "select * from FireEmblemUsers where Username = '$user' and Password = '$pass'");
			if(mysqli_num_rows($login) == 1){
				$person = mysqli_fetch_array($login);
				$email = $person['Email'];
				$id = $person['ID'];
				
				$_SESSION['Username'] = $user;
				$_SESSION['email'] = $email;
				$_SESSION['LoggedIn'] = 1;
				$_SESSION['LogId'] = $id;
				
				echo $_SESSION['Username'];
				echo $_SESSION['LoggedIn'];
				echo "LOGGED IN";
			
			}
			else { echo "TRY AGAIN"; }
		}
		else
		{ 
		?>
		<form method="POST" action="login.php" name="loginform" id="loginform">
			<input type="text" 		name="username" id="username">Username</input><br>
			<input type="password" 	name="password" id="password">Password</input><br>
			<input type="submit" 	name="createuser" id="createuser" value="Log In" />
		</sftp://noschese:@cscilab.bc.edu//home/noschese/public_html/login.phpform>
		<?php } ?>
		<?php
				$servername = "localhost";
				$username = "noschese";
				$password = "npEN4yQJ";
				$dbname = "noschese";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				$sql = "INSERT INTO FireEmblemUsers (Username, Email, Password)
				VALUES ($newuser', 'Doe', 'john@example.com')";

				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}

				$conn->close();
				?>
		<form method="POST" action="login.php" name="loginform" id="loginform">
			<input type="text" 		name="newusername" id="newusername">Username</input><br>
			<input type="password" 	name="newpassword" id="newpassword">Password</input><br>
			<input type="email"     name="email"       id="email">Email</input><br>
			<input type="submit" 	name="newuser" id="newuser" value="Sign Up" />
		</form>
		<?php } ?>
 </div>
  </body>
  </html>
  