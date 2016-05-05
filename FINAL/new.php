<?php
session_start();
echo "<head><link rel='stylesheet' type='text/css' href='bootstrap.css'></head><body>";
$champion = $_GET['char'];
$dbc = @mysqli_connect('localhost', 'noschese', 'npEN4yQJ', 'noschese') 
OR die("Could not connect to database: ".mysqli_connect_error());
$query = "select * from FireEmblemChars where ID='$champion'";
$Wins1 = "select Wins from FireEmblemUsers where ID='$champion'";
/* $_SESSION['Username'];*/
$Win = mysqli_query($dbc, $Wins1);
$row1 = mysqli_fetch_array($Win, MYSQLI_ASSOC);
$update = $row1['Wins'];
$result = mysqli_query ($dbc, $query) OR die('Invalid query: ' . mysqli_error($dbc));
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$data = json_encode($row);
$champ_data = json_decode($data, true);
$garon = array("Name"=>"King Garon","Attack"=>"61","Defense"=>"30","Speed"=>"30",
"Weapon"=>"Bolverk","Health"=>"80","Avoid"=>"60","HitRate"=>"110",
"Image"=>'<img src="http://vignette2.wikia.nocookie.net/fireemblem/images/5/57/Garon_portrait.png/revision/latest?cb=20150620155215">');
$name = $champ_data['Name'];
$hp = $champ_data['Health'];
$att = $champ_data['Attack'];
$avo = $champ_data['Avoid'];
$hit = $champ_data['HitRate'];
$wea = $champ_data['Weapon'];
$def = $champ_data['Defense'];
$gdam = $garon['Attack'] - $def;
$champacc = $hit - $garon['Avoid'];
$garonacc = $garon['HitRate'] - $avo;
echo "<div style='text-align:right'><h1>King Garon <br>". $garon['Image']."</h1></div>";
echo "<div style='text-align:right'><p>HP: ". $garon['Health']."</p></div>";
echo "<div style='text-align:right'><p>Damage: ". $gdam."</p></div>";
echo "<div style='text-align:right'><p>Hit: ". $garonacc."%</p></div>";
echo "<div style='text-align:right'><p>Weapon: ". $garon['Weapon']."</p></div>";
echo "<img src=${champ_data['image']} alt=${champ_data['Name']}><br>";
$pdam = $att - $garon['Defense'];
$ghealth = $garon['Health'];
$garondam = $champ_data['Health'] - $gdam;

echo $name;
echo "<br>";
echo "HP: "; echo $hp; 
echo "<br>";
echo "Damage: "; echo $pdam;
echo "<br>";
echo "Hit: "; echo $champacc; echo "%";
echo "<br>";
echo "Weapon: "; echo $wea;

$myhealth = $hp;
$theirhealth = $ghealth;

while ($myhealth > 0 and $theirhealth > 0) {
	$randval = rand(0,100);
	if ($randval > $champacc) {
		echo "Your attack missed!<br>";
	}
	else {
		// you hit
		$theirhealth -= $pdam;
		echo "You hit! Garon health: ".$theirhealth."<br>";
		if ($theirhealth <= 0) {
			break;
		}
	}
	if ($randval > $garonacc) {
		echo "Garon missed!<br>";
	}
	else {
		// they hit
		$myhealth -= $gdam;
		echo "Garon hit! Your health: ".$myhealth."<br>";
		if ($myhealth <= 0) {
			break;
		}
	}

}
if ($myhealth <= 0) {
	// I lost
	$use = $_SESSION['Username'];
	echo "$use lost!<br>";
	$lossque = "Update FireEmblemUsers Set Losses=Losses + 1 Where Username='$use'";
	$tableup1 = mysqli_query($dbc, $lossque) Or die('Invalid query: ' .mysqli_error($dbc));
}
else {
	// I won
	$use = $_SESSION['Username'];
	echo "$use wins!<br>";
	$winque = "Update FireEmblemUsers Set Wins=Wins + 1 Where Username='$use'" ;
	$tableup = mysqli_query($dbc, $winque) Or die('Invalid query: ' .mysqli_error($dbc));
}
echo "</body>";
/*
for ($i = 0 ; $ghealth - $pdam > 0 ; $i++) {
	$nghealth = $ghealth - $pdam;
	$int = rand (0,100);
do {	if ($int > $champacc) { 
	echo "Your attack missed!<br>";
	
} 
	if ($int > $champacc) {
		echo "Your attack missed!<br>";
	}
	else {
		echo $nghealth;
		$nghealth = $nghealth - $pdam;
		echo "<br>";
	}
	} while ($nghealth > 0);
	do  { if ($nghealth <= 0 || $nphealth <= 0) 
		break;
	}
	while ($nghealth <= 0);
		{echo $nghealth;
		 echo "You win!";
		 break;
	}
}
for ($j = 0 ; $champ_data['Health'] - $gdam > 0 ; $j++) {
	$nphealth = $champ_data['Health'] - $pdam;
do {	if ($int > $garonacc) { 
	echo "Garon missed!<br>";
	break;
	
} 
else {
	echo $nphealth;
	$nphealth = $nphealth - $gdam;
	echo "<br>";
}
} while ($nphealth > 0);
if ($nphealth <= 0) {
	echo $nphealth;
	echo "You lose!";
	break;
}
}
*/

?>