<?php 
$conn = mysqli_connect('127.0.0.1', 'root', '', 'itvillage');

if(!$conn){
	die('Connection failed' . mysqli_connect_error() . ' - '. mysqli_connect_errno());
}else{
	mysqli_set_charset ($conn, "utf8");
}