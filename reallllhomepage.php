<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Fire Emblem Battle Simulator</title>
			<link rel="stylesheet" type="text/css" href="css/960_12_col.css" />
			<link rel="stylesheet" type="text/css" href="Katzhw.css" />
	</head>
	<body>
	<audio autoplay loop="loop">
	  <source src="ocean.mp3" type="audio/mpeg">
 	</audio>
		<div class="container_12 clearfix">
			<div id="header" class="grid_12">
				<h1>Fire Emblem Fates Battle Simulator</h1>
				<div id="nav">
					<ul>
				
					<?php
						if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
						{
							echo $_SESSION['Username'];
							echo '<br>';
							echo "<a href=\"logout.php\">Log Out</a>";
						}
						else
						{
							echo "<a href=\"http://cscilab.bc.edu/~noschese/login1.php\">Log In</a>";
						}
					?>
						<li><a href="http://fireemblemfates.nintendo.com/">Create Team</a></li>
						<li><a href="http://fireemblem.wikia.com/wiki/Fire_Emblem_Fates">Battle</a></li>
					</ul>
				</div>
			</div>
			<div id="feature" class="grid_12">
				<p><a class="twitter-timeline" href="https://twitter.com/FEFates" data-widget-id="727295099030388740">Tweets by @FEFates</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</p>
			</div>
			<div class="article grid_6">
				<p><a href="http://fireemblemfates.nintendo.com/">
<img border="0" alt="KamuiM" src="corrinm.jpg" width="150" height="200"> </a> </p>
			</div>
			<div class="article grid_6">
				<p><a href="http://fireemblem.wikia.com/wiki/Fire_Emblem_Fates">
<img border="0" alt="KamuiF" src="corrinf.jpg" width="150" height="200"> </a> </p>
			</div>
			<div class="article grid_6">
				<p><a href="https://kantopia.wordpress.com/2015/06/23/fire-emblem-fates-importers-source-chapter-data-ongoing/">
<img border="0" alt="Hoshido" src="ryoma.jpg" width="150" height="200"> </a> </p>
			</div>
			<div class="article grid_6">
				<p><a href="http://fireemblem.wikia.com/wiki/List_of_characters_in_Fire_Emblem_Fates">
<img border="0" alt="Noir" src="xander.jpg" width="150" height="200"> </a> </p>
			</div>
			<div id="footer" class="grid_12">
				<p>&copy; Copyright 2011</p>
			</div>
		</div><!-- .container_12 -->
	</body>
</html>