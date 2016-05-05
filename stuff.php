	<audio autoplay loop="loop">
	  <source src="guestoflight.mp3" type="audio/mpeg">
 	</audio>
<?php 
if (isset($_POST['ncreateuser'])) {

$nuser = $_POST['nusername'];
$npass = sha1($_POST['npassword']);
$email = $_POST['email'];

$dbc = @mysqli_connect('localhost', 'noschese', 'npEN4yQJ', 'noschese') 
			OR die("Could not connect to database: ".mysqli_connect_error());
$query = "insert into FireEmblemUsers (Username, Email, Password) values ('$nuser','$email', '$npass')";

$result = mysqli_query($dbc, $query) OR die('Invalid query: ' . mysqli_error($dbc));
}
?>

<form method="post" name="signupform" id="signupform">
	<input type="text" 		name="nusername" id="nusername"/>Username<br>
	<input type="email"		name="email"	 id="email"/>Email Address<br>
	<input type="password" 	name="npassword" id="npassword"/>Password<br>
	<input type="submit" 	name="ncreateuser" id="ncreateuser" value="Sign Up!" />
</form>