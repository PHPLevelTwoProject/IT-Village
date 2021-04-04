<?php

$random_dice_number = $_SESSION['random_dice_number'];

// legacy code
//if ($_SESSION['click_count'] == 2) {
//	$random_dice_number = 0;
//	$random_dice_number += 1;
////	if ($random_dice_number > 6) {
////	    $overdraft = $random_dice_number - 6;
////		$random_dice_number -= $overdraft;
////	}
//}

// debugging and testing purposes, do not delete for now
//echo "Dice number is " . $random_dice_number;
//echo "<br>";
//echo "Click count is " . $_SESSION['click_count'];

// conditional rendering
if ($random_dice_number == 1) { ?>
    <img src="./images/dice/dice_1.png" alt="">
    <br><br>
<?php }
if ($random_dice_number == 2) { ?>
    <img src="./images/dice/dice_2.png" alt="">
    <br><br>
<?php }
if ($random_dice_number == 3) { ?>
    <img src="./images/dice/dice_3.png" alt="">
    <br><br>
<?php }
if ($random_dice_number == 4) { ?>
    <img src="./images/dice/dice_4.png" alt="">
    <br><br>
<?php }
if ($random_dice_number == 5) { ?>
    <img src="./images/dice/dice_5.png" alt="">
    <br><br>
<?php }
if ($random_dice_number == 6) { ?>
    <img src="./images/dice/dice_6.png" alt="">
    <br><br>
<?php }

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
