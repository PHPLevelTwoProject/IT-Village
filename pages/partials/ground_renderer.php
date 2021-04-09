<?php

if ($_SESSION['click_count'] == 2) {
    // adding a one so it works right
	$_SESSION['current_gameground_position'] += 1;

	// increment the player's position with the starting point
	$_SESSION['current_gameground_position'] += $_SESSION['starting_point'];
}

// if player's position is out of bounds - correct it
if ($_SESSION['current_gameground_position'] > 11) {
	$_SESSION['current_gameground_position'] -= 12;
}

$position = $_SESSION['current_gameground_position'];
$validated_position = ($position >= 0 && $position <= 11) ? $position : "";

?>

<img src="./images/gameground/gameground_state_<?= $validated_position ?>.png" alt=""><br><br>

<?php

if ($position == 10) {
    $_SESSION['user_has_won_because_of_vso'] = true;
	check_if_game_is_won_and_act();
    return;
}

function check_if_game_is_won_and_act() {
	if ($_SESSION['user_has_won_because_of_vso']) {
		header('Location: ./won.php');
	}
}

?>
