<?php

$username = $_GET["username"];
$password = $_GET["password"];
$repeat = $_GET["repeat"];

register();

function validateUser() {
	if (strlen($username < 6) || (strlen($username > 20)) {
		return False;
	} else {
		return True;
	}
}

function validatePass() {
	if (strlen($password < 6) || (strlen($password > 20)) {
		return False;
	} else {
		return True;
	}
}

function validateRepeat() {
	if ($password == $repeat) {
		return True;
	} else {
		return False;
	}
}

function validateForm() {
	if (validateUser() == TRUE && validatePass() == TRUE && validateRepeat() == TRUE) {
		$validated = True;
		return validated;
	} elseif (validateUser() == FALSE) {
		$validated = "user"
		return $validated;
	} elseif (validatePass() == FALSE) {
		$validated = "pass"
		return $validated;
	} elseif (validateRepeat() == FALSE) {
		$validated = "repeat"
		return $validated;
	}

}


function register() {
	$validated = validateForm() 
	
	if ($validated == TRUE) {		
		run_sql();
	} else if ($validated == "user") {
		echo "<p align='center'> <font color='#004280'> Username does not meet requirements </font></p>";
	} else if ($validated == "pass") {
		echo "<p align='center'> <font color='#004280'> Password does not meet requirements </font></p>";
	} else if ($validated == "repeat") {
		echo "<p align='center'> <font color='#004280'> Passwords do not match </font></p>";
	}
}


function run_sql() {

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
