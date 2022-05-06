<?php

$username = $_GET["username"];
$password = $_GET["password"];
$repeat = $_GET["repeat"];

register($username, $password, $repeat);

function validateUser($username) {
	if (strlen($username < 6) || (strlen($username > 20)) {
		return False;
	} else {
		return True;
	}
}

function validatePass($password) {
	if (strlen($password < 6) || (strlen($password > 20)) {
		return False;
	} else {
		return True;
	}
}

function validateRepeat($repeat) {
	if ($password == $repeat) {
		return True;
	} else {
		return False;
	}
}

function validateForm($username, $password, $repeat) {
	$user = validateUser($username);
	$pass = validatePass($password);
	$reap = validateRepeat($repeat);

	if ($user == TRUE && $pass == TRUE && $reap == TRUE) {
		$validated = True;
		return validated;
	} elseif ($user == FALSE) {
		$validated = "user"
		return $validated;
	} elseif ($pass == FALSE) {
		$validated = "pass"
		return $validated;
	} elseif ($reap == FALSE) {
		$validated = "repeat"
		return $validated;
	}

}


function register($username, $password, $repeat) {
	$validated = validateForm($username, $password, $repeat) 
	
	if ($validated == TRUE) {		
		run_sql($username, $password);
	} else if ($validated == "user") {
		echo "<p align='center'> <font color='#004280'> Username does not meet requirements </font></p>";
	} else if ($validated == "pass") {
		echo "<p align='center'> <font color='#004280'> Password does not meet requirements </font></p>";
	} else if ($validated == "repeat") {
		echo "<p align='center'> <font color='#004280'> Passwords do not match </font></p>";
	}
}


function run_sql($username, $password) {

	$server = "spring-2022.cs.utexas.edu";
	$my_user = "cs329e_bulko_mariana";
	$my_password = "derby6crude6divine";
	$dbName = "cs329e_bulko_mariana";

	$mysqli = new mysqli ($server, $my_user, $my_password, $dbName);

	$command = "SELECT * FROM howdyusers WHERE user = \"$username\"";
	$result = $mysqli -> query($command);


		
	if ($result->num_rows > 0) {
		echo "<p align='center'> <font color='#004280'> Username already exists </font></p>";

	} else {
		$command = "INSERT INTO howdyusers VALUES ('$username', '$password')";
		$mysqli -> query($command);
		
		echo "<p align='center'> <font color='#004280'> Thank you for registering! </font></p>";
	}
}
?>
