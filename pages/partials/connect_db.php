<?php

if (getenv('environment') === 'production') {
	$connection = mysqli_connect(
		getenv("hostname"),
		getenv("username"),
		getenv("password"),
		getenv("database")
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
