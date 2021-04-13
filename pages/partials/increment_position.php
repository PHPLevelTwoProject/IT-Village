<?php

function increment_current_position() {
	$_SESSION['current_gameground_position'] += $_SESSION['random_dice_number'];
}

