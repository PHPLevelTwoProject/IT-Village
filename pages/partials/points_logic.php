<?php

/*
 * Wi-Fi кръчма - P - Трябва да си купите един Cloud Коктейл - -5 монети - няколко
 * Wi-Fi мотел - I - Много
 * -- Ако имате достатъчно пари, трябва да го купите -> -100 монети
 * -- Ако нямате достатъчно пари, трябва да си платите за престоя -> -10 монети
 * Freelance Project - F - Получавате заплащане - +20 монети - Много
 * Буря - S - Wi-Fi в селото умира и вие се депресирате и изпускате 2 хода. - Много
 * Супер РНР - V - Монетите ви се увеличават 10 пъти - *10 - Само едно поле
 * VSO - N - Ако стъпите на това поле - печелите игра - едно
 * Входна позиция - - - Полето, от което стартирате играта - Само едно
 * Празни полета - 0 - Празно поле - - - Винаги 4
 */

// Start => P => I => F => S => F => V => I => F => F => I => N => P =>  Go to First Position
// Start => Wi-Fi-Bar => Wi-Fi-Motel => Freelance Project
//       => Storm => Freelance Project => Super-PHP => Wi-Fi-Motel
//       => Freelance Project => Freelance Project => Wi-Fi-Motel => VSO
//       => Wi-Fi-Bar => Go to First Position

//$points = [
//	"Wi-Fi-Bar" => "-5 money",
//	"Wi-Fi-Motel-1" => "-100 money",
//	"Wi-Fi-Motel-2" => "-10 money",
//	"Freelance-Project" => "+20 money",
//	"Storm" => "skip 2 rounds money",
//	"Super-PHP" => "* 10",
//	"VSO" => "win the game",
//];

if (isset($_SESSION['current_gameground_position']) && $_SESSION['current_gameground_position'] != -1) {
	$_SESSION['turns_count'] -= 1;

	// to be implemented: penalty for being in the storm earlier - no money from the motels

	// if he has to skip position we don't move him
	if ($_SESSION['has_to_skip_two_rounds'] == true) {
		// increment skipped rounds count to keep track of them
		$_SESSION['skipped_rounds_count'] += 1;
		// if he has already skipped two rounds, free him
		if ($_SESSION['skipped_rounds_count'] == 2) {
			$_SESSION['skipped_rounds_count'] = 0;
			$_SESSION['has_to_skip_two_rounds'] = false;
		}
		// explanation - suppose he steps at number 1 and is storm
		// => we set "should skip 2 rounds" to true
		// => he comes and we increment skipped count to 1
		// => he comes a second time (because of the boolean) and his count is 1, but this is his second round skipped,
		//    meaning we have to free him, by setting the bool to false
	}
	else {
		if (isset($position) && $position == 0) { // Bar
			bar();
		}
		else if (isset($position) && $position == 1) { // Motel
			motel();
		}
		else if (isset($position) && $position == 2) { // Freelance Project
			freelance();
		}
		else if (isset($position) && $position == 3) { // Storm
			$_SESSION['has_to_skip_two_rounds'] = true;
		}
		else if (isset($position) && $position == 4) { // Freelance Project
			freelance();
		}
		else if (isset($position) && $position == 5) { // Super-PHP
			super_php();
		}
		else if (isset($position) && $position == 6) { // Motel
			motel();
		}
		else if (isset($position) && $position == 7) { // Freelance Project
			freelance();
		}
		else if (isset($position) && $position == 8) { // Freelance Project
			freelance();
		}
		else if (isset($position) && $position == 9) { // Motel
			motel();
		}
//		else if (isset($position) && $position == 10) { // VSO, already handled logic by the function below
//			win_game();
//		}
		else if (isset($position) && $position == 11) { // bar
			bar();
		}
	}

	// always check the state
	check_if_game_is_lost_or_won_and_take_action();
}

// if he steps on motel and has money => buy it and decrement money; else => pay the tax
function motel() {
	// is it okay to have 0 points for a millisecond?
	// suppose he has 100 and buys the motel and then gains 20 - is this permitted
	if ($_SESSION['user_points'] >= 100) {
		// buy the motel with a price of 100
		$_SESSION['user_points'] -= 100;

		// for every motel bought - gain 20 money
		$_SESSION['user_points'] += 20;

		//increase motels bought count
		$_SESSION['motels_bought']  += 1;
	}
	else {
		// pay tax if insufficient money
		$_SESSION['user_points'] -= 10;
	}
}

// super php multiplies points by 10
function super_php() {
	$_SESSION['user_points'] *= 10;
}

// drinking in the bar decreases points by 5
function bar() {
	$_SESSION['user_points'] -= 5;
}

// freelancing gives plus 20 points
function freelance(){
	$_SESSION['user_points'] += 20;
}

// game ends when player has:
// - insufficient money
// - bought every single motel
// - no more turns
// - stepped on VSO field - already handled by win_game()
// to be implemented: save his score to db (name, score, date of game played)
function check_if_game_is_lost_or_won_and_take_action() {
	if ($_SESSION['user_points'] <= 0) {
		// he is lost because of money, set that value to true and return
		$_SESSION['user_has_lost_because_of_money'] = true;
		header('Location: lost.php');
	}
	if ($_SESSION['turns_count'] == 0) {
		// he is lost because of insufficient turns, set that value to true and return,
		$_SESSION['user_has_lost_because_of_turns'] = true;
		header('Location: lost.php');
	}

	if ($_SESSION['current_gameground_position'] == 10) {
		// he has the support of vso => wins
		$_SESSION['user_has_won_because_of_vso'] = true;
		header('Location: won.php');
	}
	if ($_SESSION['motels_bought'] == 3) {
		// he bought all motels -> he wins, write to database and render result
		$_SESSION['user_has_won_because_of_motels'] = true;
		header('Location: won.php');
	}
}

