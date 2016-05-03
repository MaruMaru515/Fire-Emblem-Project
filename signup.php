<?php 
$user = $_POST['user'];
$email = $_POST['email'];
$pass = sha1($_POST['pass']);
$affl = $_POST['affl'];

$dbc = @mysqli_connect('localhost', 'noschese', 'npEN4yQJ', 'noschese') OR die("Could not connect to database: ".mysqli_connect_error());
$query = "insert into fireemblemusers (Username,Email,Password,Affiliation,Wins,Losses) values ('$user','$pass','$email','$affl',0,0)";
$result = mysqli_query ($dbc, $query) OR die('Invalid query: ' . mysqli_error($dbc));
echo $result;
?>