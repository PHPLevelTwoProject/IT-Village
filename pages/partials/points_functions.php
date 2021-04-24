<?php

// the turn is storm
function storm()
{
    $_SESSION['has_to_skip_two_rounds'] = true;
}

// if he steps on motel and has money => buy it and decrement money; else => pay the tax
function motel()
{
    // suppose he has 100 and buys the motel and then gains 20 - is this permitted
    if ($_SESSION['user_points'] >= 100) {
        // buy the motel with a price of 100
        $_SESSION['user_points'] -= 100;

        // if he has stepped on storm recently - now that is forgotten
        if ($_SESSION['has_recently_stepped_on_storm']) {
            $_SESSION['has_recently_stepped_on_storm'] = false;
        } else {
            // for every motel bought - gain 20 money, if hasn't stepped on storm recently
            $_SESSION['user_points'] += 20;
        }

        // increase motels bought count
        $_SESSION['motels_bought'] += 1;
    } else {
        // pay tax if insufficient money
        $_SESSION['user_points'] -= 10;
    }
}

// super php multiplies points by 10
function super_php()
{
    $_SESSION['user_points'] *= 10;
}

// drinking in the bar decreases points by 5
function bar()
{
    $_SESSION['user_points'] -= 5;
}

// freelancing gives plus 20 points
function freelance()
{
    $_SESSION['user_points'] += 20;
}

function check_if_game_is_lost_or_won_and_take_action()
{
    if ($_SESSION['user_points'] <= 0) {
        // he have lost because of insufficient money, set that value to true and redirect
        save_score_to_database(0);
        $_SESSION['user_has_lost_because_of_money'] = true;
    }
    if ($_SESSION['turns_count'] == 0) {
        // he have lost because of insufficient turns, set that value to true and redirect
        save_score_to_database(1);
        $_SESSION['user_has_lost_because_of_turns'] = true;
    }
    if ($_SESSION['current_gameground_position'] == 10) {
        // he has the support of vso => wins, set that value to true and redirect
        save_score_to_database(2);
        $_SESSION['user_has_won_because_of_vso'] = true;
    }
    if ($_SESSION['motels_bought'] == 3) {
        // he has bought all motels and therefore wins, set that value to true and redirect
        save_score_to_database(3);
        $_SESSION['user_has_won_because_of_motels'] = true;
    }
}

function modify_points()
{
    if (isset($_SESSION['current_gameground_position']) && $_SESSION['current_gameground_position'] != -1) {
        $_SESSION['turns_count'] -= 1;

        // if he has to skip position we don't move him
        if ($_SESSION['has_to_skip_two_rounds'] == true) {
            $_SESSION['skipped_rounds_count'] += 1;

            // if he has already skipped two rounds, free him
            if ($_SESSION['skipped_rounds_count'] == 2) {
                $_SESSION['skipped_rounds_count'] = 0;
                $_SESSION['has_to_skip_two_rounds'] = false;
            }

            // he has stepped on storm recently
            $_SESSION['has_recently_stepped_on_storm'] = true;
        } else {
            $position = $_SESSION['current_gameground_position'];

            if (isset($position) && $position == 0) {
                bar();
            } else if (isset($position) && $position == 1) {
                motel();
            } else if (isset($position) && $position == 2) {
                freelance();
            } else if (isset($position) && $position == 3) {
                storm();
            } else if (isset($position) && $position == 4) {
                freelance();
            } else if (isset($position) && $position == 5) {
                super_php();
            } else if (isset($position) && $position == 6) {
                motel();
            } else if (isset($position) && $position == 7) {
                freelance();
            } else if (isset($position) && $position == 8) {
                freelance();
            } else if (isset($position) && $position == 9) {
                motel();
            } else if (isset($position) && $position == 10) {
                check_if_game_is_lost_or_won_and_take_action();
                return;
            } else if (isset($position) && $position == 11) {
                bar();
            }
        }

        check_if_game_is_lost_or_won_and_take_action();
    }
}

function save_score_to_database($is_win)
{
    $user = $_SESSION['user'];
    $score = $_SESSION['user_points'];
    $date = date("Y-m-d");

    // connect to different db depending on environment
    if (getenv('environment') == 'production') {
        //Get Heroku ClearDB connection information
        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $cleardb_server = $cleardb_url["host"];
        $cleardb_username = $cleardb_url["user"];
        $cleardb_password = $cleardb_url["pass"];
        $cleardb_db = substr($cleardb_url["path"], 1);
        $active_group = 'default';
        $query_builder = TRUE;

        // Connect to DB
        $connection = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
    } else {
        $connection = mysqli_connect("127.0.0.1", "root", "", "itvillage");
    }

    if (getenv('environment') == 'production') {
        $select_user = "SELECT `user_id` FROM `heroku_6b647d0a28c075b`.`users` WHERE `username` = '$user'";
    } else {
        $select_user = "SELECT `user_id` FROM `itvillage`.`users` WHERE `username` = '$user'";
    }

    $select_user_result = mysqli_query($connection, $select_user);
    $user_with_id = mysqli_fetch_assoc($select_user_result);

    $_SESSION["user_id"] = $user_with_id["user_id"];

    $user_id = $_SESSION["user_id"];

    // insert a win or a lose to that user
    if (getenv('environment') == 'production') {
        $add_score = "INSERT INTO `heroku_6b647d0a28c075b`.`scores` (`user_id`, `score`, `is_win`, `date_created`) 
				  	  VALUES ($user_id, $score, '$is_win', '$date')";
    } else {
        $add_score = "INSERT INTO `itvillage`.`scores` (`user_id`, `score`, `is_win`, `date_created`) 
				  	  VALUES ($user_id, $score, '$is_win', '$date')";
    }

    $add_score_result = mysqli_query($connection, $add_score);

    // select user's win count and increment it if it's a win
    if ($is_win == 2 || $is_win == 3) {
        if (getenv('environment') == 'production') {
            $select_user_win_count = "SELECT `wins_count` FROM `heroku_6b647d0a28c075b`.`users` WHERE `user_id` = '$user_id'";
        } else {
            $select_user_win_count = "SELECT `wins_count` FROM `itvillage`.`users` WHERE `user_id` = '$user_id'";
        }

        $select_user_win_count_result = mysqli_query($connection, $select_user_win_count);

        $count = mysqli_fetch_assoc($select_user_win_count_result);
        $count["wins_count"] = (int)$count["wins_count"] + 1;

        $wins_count = $count["wins_count"];
        $increment_wins_count = "UPDATE `itvillage`.`users` SET `wins_count` = '$wins_count' WHERE `user_id` = '$user_id'";
        $increment_wins_count_result = mysqli_query($connection, $increment_wins_count);
    }
}
