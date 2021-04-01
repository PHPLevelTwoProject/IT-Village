<?php

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

// set motels bought count to zero
if (!isset($_SESSION['motels_bought'])) {
	$_SESSION['motels_bought'] = 0;
}

// player's turns count
if (!isset($_SESSION['turns_count'])) {
	// make this to be the number drawn on first dice roll
	$_SESSION['turns_count'] = -1;

	// generate user's starting point and turns' count
	if ($_SESSION['click_count'] == 0 && $_SESSION['turns_count'] == -1) {
		$_SESSION['turns_count'] = rand(1, 20);
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

// set game end's booleans
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

//login logic
if (!isset($_SESSION['should_not_render_register'])) {
	$_SESSION['should_not_render_register'] = false;
}

if (!isset($_SESSION['should_not_render_login'])) {
	$_SESSION['should_not_render_login'] = false;
}

if (!isset($_SESSION['user'])) {
	$_SESSION['user'] = "";
}

if (!isset($_SESSION['user_id'])) {
	$_SESSION['user_id'] = 0;
}
