<?php

if ($_SESSION['click_count'] == 2) {
    // adding a one so it works right
	$_SESSION['current_gameground_position'] += 1;

	// increment the player's position with the starting point
	$_SESSION['current_gameground_position'] += $_SESSION['starting_point'];

	// if player's position is out of bounds - correct it
	if ($_SESSION['current_gameground_position'] > 11) {
		$_SESSION['current_gameground_position'] -= 12;
	}
}

$position = $_SESSION['current_gameground_position'];

if ($position == 0) { ?>
	<img src="./images/gameground/gameground_state_0.png" alt=""><br><br>
<?php }
if ($position == 1) { ?>
	<img src="./images/gameground/gameground_state_1.png" alt=""><br><br>
<?php }
if ($position == 2) { ?>
	<img src="./images/gameground/gameground_state_2.png" alt=""><br><br>
<?php }
if ($position == 3) { ?>
	<img src="./images/gameground/gameground_state_3.png" alt=""><br><br>
<?php }
if ($position == 4) { ?>
	<img src="./images/gameground/gameground_state_4.png" alt=""><br><br>
<?php }
if ($position == 5) { ?>
	<img src="./images/gameground/gameground_state_5.png" alt=""><br><br>
<?php }
if ($position == 6) { ?>
	<img src="./images/gameground/gameground_state_6.png" alt=""><br><br>
<?php }
if ($position == 7) { ?>
	<img src="./images/gameground/gameground_state_7.png" alt=""><br><br>
<?php }
if ($position == 8) { ?>
	<img src="./images/gameground/gameground_state_8.png" alt=""><br><br>
<?php }
if ($position == 9) { ?>
	<img src="./images/gameground/gameground_state_9.png" alt=""><br><br>
<?php }
if ($position == 10) {
	$_SESSION['user_has_won_because_of_vso'] = true;
	check_if_game_is_lost_or_won_and_act();
	return; ?>
	<img src="./images/gameground/gameground_state_10.png" alt=""><br><br>
<?php }
if ($position == 11) { ?>
	<img src="./images/gameground/gameground_state_11.png" alt=""><br><br>
<?php }

function check_if_game_is_lost_or_won_and_act() {
	if ($_SESSION['user_has_won_because_of_vso']) {
		header('Location: ./won.php');
	}
}
