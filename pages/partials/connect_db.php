<?php

if (getenv('environment') === 'production') {
	$hostname = getenv('hostname');
	$username = getenv('username');
	$password = getenv('password');
	$database = getenv('database');

	$connection = mysqli_connect(
		$hostname,
		$username,
		$password,
		$database
	);
}
else {
	$connection = mysqli_connect(
		"127.0.0.1",
		"root",
		"",
		"itvillage"
	);
}

if (!$connection) {
	die("Connection failed. " . mysqli_connect_error() . " - " . mysqli_connect_errno());
} else {
	mysqli_set_charset($connection, "utf8");
}
