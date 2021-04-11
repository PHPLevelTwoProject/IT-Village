<?php

session_start();

// reset variables
unset($_SESSION['user_points']);
unset($_SESSION['click_count'] );
unset($_SESSION['random_dice_number'] );

unset($_SESSION['turns_count']);
unset($_SESSION['current_gameground_position'] );
unset($_SESSION['starting_point']);

unset($_SESSION['motels_bought'] );
unset($_SESSION['has_to_skip_two_rounds']);
unset($_SESSION['skipped_rounds_count'] );

unset($_SESSION['user_has_won_because_of_vso'] );
unset($_SESSION['user_has_won_because_of_motels'] );
unset($_SESSION['user_has_lost_because_of_money'] );
unset($_SESSION['user_has_lost_because_of_turns']);
unset($_SESSION['has_recently_stepped_on_storm']);

header('Location: ./../play.php');