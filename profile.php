<?php

$server = "spring-2022.cs.utexas.edu";
$my_user = "cs329e_bulko_mariana";
$my_password = "derby6crude6divine";
$dbName = "cs329e_bulko_mariana";

$mysqli = new mysqli ($server, $my_user, $my_password, $dbName);

$username = $mysqli -> real_escape_string($_GET["username"]);
$password = $mysqli -> real_escape_string($_GET["password"]);

$command = "SELECT * FROM howdyusers WHERE user = \"$username\"";
$result = $mysqli -> query($command);


if ($result->num_rows > 0) {
	echo "<p align='center'> <font color='#004280'> Username already exists </font></p>";

} else {
	$command = "INSERT INTO howdyusers VALUES ('$username', '$password')";
	$mysqli -> query($command);

	setcookie ("username", $username, time()+3600*24*3, "/");

		
	echo "<p align='center'> <font color='#004280'> Thank you for registering! </font></p>";
}

?>
