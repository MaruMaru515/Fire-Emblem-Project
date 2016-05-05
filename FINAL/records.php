<?php session_start();
echo "<h1>Records</h1>";
$dbc = @mysqli_connect('localhost', 'noschese', 'npEN4yQJ', 'noschese') 
OR die("Could not connect to database: ".mysqli_connect_error());
$query = "select Username, Wins, Losses from FireEmblemUsers";
$result = mysqli_query ($dbc, $query) OR die('Invalid query: ' . mysqli_error($dbc));
$result1 = $dbc->query($query);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Username: " . $row["Username"]. " - Wins: " . $row["Wins"]. " - Losses: " . $row["Losses"]. "<br>";
    }
} else {
    echo "0 results";
}
$dbc->close();
?>