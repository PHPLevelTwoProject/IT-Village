<?php

if (getenv('environment') === 'production') {
	$connection = mysqli_connect(
		$_ENV["hostname"],
		$_ENV["username"],
		$_ENV["password"],
		$_ENV["database"],
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
