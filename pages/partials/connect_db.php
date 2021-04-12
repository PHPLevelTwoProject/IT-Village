<?php

if (getenv('environment') == 'production') {
	//Get Heroku ClearDB connection information
	$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$cleardb_server = $cleardb_url["host"];
	$cleardb_username = $cleardb_url["user"];
	$cleardb_password = $cleardb_url["pass"];
	$cleardb_db = substr($cleardb_url["path"],1);
	$active_group = 'default';
	$query_builder = TRUE;

	// Connect to DB
	$connection = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
}
else {
	$connection = mysqli_connect("127.0.0.1","root","","itvillage");
}

if (!$connection) {
	die("Connection failed. " . mysqli_connect_error() . " - " . mysqli_connect_errno());
} else {
	mysqli_set_charset($connection, "utf8");
}
