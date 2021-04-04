<?php


$connection = mysqli_connect(
	getenv('hostname') or '127.0.0.1',
	getenv('username') or 'root',
	getenv('password') or '',
	getenv('database') or 'itvillage'
);

if (!$connection) {
	die('Connection failed. ' . mysqli_connect_error() . ' - ' . mysqli_connect_errno());
} else {
	mysqli_set_charset($connection, "utf8");
}
