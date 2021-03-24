<?php

session_start();

// start with 50 points
if (!isset($_SESSION['user_points'])) {
	$_SESSION['user_points'] = 50;
}

// at game start, there are 0 clicks
if (!isset($_SESSION['click_count'])) {
	$_SESSION['click_count'] = 0;
}

// set random dice number to -1 at the start
if (!isset($_SESSION['random_dice_number'])) {
	$_SESSION['random_dice_number'] = -1;
}

// current position of the player
if (!isset($_SESSION['current_gameground_position'])) {
	$_SESSION['current_gameground_position'] = -1;
}

// starting position of the player
if (!isset($_SESSION['starting_point'])) {
	$_SESSION['starting_point'] = 0;
}

// if position is out of bounds, lower it to correct value
if (isset($_SESSION['current_gameground_position']) && $_SESSION['current_gameground_position'] > 11) {
    $_SESSION['current_gameground_position'] -= 12;
}

// set motels bought count to zero
if (!isset($_SESSION['motels_bought'])) {
	$_SESSION['motels_bought'] = 0;
}

// player's turns count
if (!isset($_SESSION['turns_count'])) {
	// make this to be the number drawn on first dice roll
	$_SESSION['turns_count'] = -1;

	if ($_SESSION['click_count'] == 0 && $_SESSION['turns_count'] == -1) {
		$_SESSION['turns_count'] = rand(0, 20);
		$_SESSION['starting_point'] = rand(0, 11);
	}
}

// skip rounds logic
if (!isset($_SESSION['has_to_skip_two_rounds'])) {
	$_SESSION['has_to_skip_two_rounds'] = false;
}
if (!isset($_SESSION['skipped_rounds_count'])) {
	$_SESSION['skipped_rounds_count'] = 0;
}

// set game end booleans
if (!isset($_SESSION['user_has_won_because_of_vso'])) {
	$_SESSION['user_has_won_because_of_vso'] = false;
}
if (!isset($_SESSION['user_has_won_because_of_motels'])) {
	$_SESSION['user_has_won_because_of_motels'] = false;
}
if (!isset($_SESSION['user_has_lost_because_of_money'])) {
	$_SESSION['user_has_lost_because_of_money'] = false;
}
if (!isset($_SESSION['user_has_lost_because_of_turns'])) {
	$_SESSION['user_has_lost_because_of_turns'] = false;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>IT Village</title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<!-- Favicons -->
	<link href="assets/img/favicon.ico" rel="icon">
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
