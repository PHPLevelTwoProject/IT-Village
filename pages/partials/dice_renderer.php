<?php

$random_dice_number = $_SESSION['random_dice_number'];
$validated_random_dice_number = ($random_dice_number >= 1 && $random_dice_number <= 6) ? $random_dice_number : "";

//// debugging and testing purposes
//echo "Dice number is " . $random_dice_number . " <br>";
//echo "Click count is " . $_SESSION['click_count'];

?>

<img src="./images/dice/dice_<?= $validated_random_dice_number ?>.png" alt="">
<br><br>

<?php

if (!$_SESSION['has_to_skip_two_rounds']) {
	if ($_SESSION['random_dice_number'] == 0) {
		$_SESSION['random_dice_number'] = rand(1, 6);
		$_SESSION['current_gameground_position'] += $_SESSION['random_dice_number'];
	}
	else if ($_SESSION['random_dice_number'] == -1) {
		$_SESSION['random_dice_number'] += 1;
	}
	else {
		$_SESSION['random_dice_number'] = rand(1, 6);
		$_SESSION['current_gameground_position'] += $_SESSION['random_dice_number'];
	}

}

//if ($_SESSION['random_dice_number'] > 0) {
//	$_SESSION['random_dice_number'] = rand(1, 6);
//	$_SESSION['current_gameground_position'] += $_SESSION['random_dice_number'];
//}

// legacy code, used to be at the top at the file
//if ($_SESSION['click_count'] == 2) {
//	$random_dice_number = 0;
//	$random_dice_number += 1;
////	if ($random_dice_number > 6) {
////	    $overdraft = $random_dice_number - 6;
////		$random_dice_number -= $overdraft;
////	}
//}
