<?php

function increment_position_at_start() {
	if ($_SESSION['click_count'] == 2) {
		// adding a one so it works right
		$_SESSION['current_gameground_position'] += 1;

		// increment the player's position with the starting point
		$_SESSION['current_gameground_position'] += $_SESSION['starting_point'];
	}
}

function correct_position() {
	// if player's position is out of bounds - correct it
	if ($_SESSION['current_gameground_position'] > 11) {
		$_SESSION['current_gameground_position'] -= 12;
	}
}

function render_ground() {
	$position = $_SESSION['current_gameground_position'];
	$validated_position = ($position >= 0 && $position <= 11) ? $position : "";

	echo "<img class=\"resize-small\" src=\"./images/gameground/gameground_state_" . $validated_position . ".png\" alt=\"\"><br><br>";
}
