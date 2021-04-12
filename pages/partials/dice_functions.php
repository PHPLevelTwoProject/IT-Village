<?php

//echo "Dice number is " . $random_dice_number . " <br>";
//echo "Click count is " . $_SESSION['click_count'];

function render_dice() {
	$random_dice_number = $_SESSION['random_dice_number'];
	$validated_random_dice_number = ($random_dice_number >= 1 && $random_dice_number <= 6) ? $random_dice_number : "";
	echo "<img class=\"resize-small\" src=\"./images/dice/dice_" . $validated_random_dice_number . ".png\" alt=\"\"><br><br>";
}

function increment_dice_number() {
	if (!$_SESSION['has_to_skip_two_rounds']) {
		if ($_SESSION['random_dice_number'] == 0) {
			$_SESSION['random_dice_number'] = rand(1, 6);
			increment_current_position();
		}
		else if ($_SESSION['random_dice_number'] == -1) {
			$_SESSION['random_dice_number'] += 1;
		}
		else {
			$_SESSION['random_dice_number'] = rand(1, 6);
			increment_current_position();
		}
	}
}
