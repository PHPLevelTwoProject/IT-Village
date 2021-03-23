<?php

session_start();

// start with 50 points, 0 motels bought, 0 rounds to skip, not won, not lost
if (!isset($_SESSION['user_points'])) {
	$_SESSION['user_points'] = 50;
}

// 0 clicks at game start
if (!isset($_SESSION['click_count'])) {
	$_SESSION['click_count'] = 0;
}

if (!isset($_SESSION['random_dice_number'])) {
	$_SESSION['random_dice_number'] = -1;
}

// current position of the player
if (!isset($_SESSION['current_gameground_position'] )) {
	$_SESSION['current_gameground_position'] = -1;
}

// if position is out of bounds, lower it to correct value
if (isset($_SESSION['current_gameground_position']) && $_SESSION['current_gameground_position'] > 11) {
    $_SESSION['current_gameground_position'] -= 12;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>PHP Project Level Two</title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
		  rel="stylesheet">
	<!-- CSS Files -->
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">

	<!-- =======================================================
	* Template Name: FlexStart - v1.1.1
	* Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
	* Author: BootstrapMade.com
	* License: https://bootstrapmade.com/license/
	======================================================== -->
</head>
