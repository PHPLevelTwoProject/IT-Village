<?php

session_start();

$_SESSION['random_dice_number'] = -1;
$_SESSION['current_gameground_position'] = -1;

session_destroy();

header('Location: ./../play.php');