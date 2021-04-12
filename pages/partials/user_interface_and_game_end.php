<?php

function user_interface()
{
	if ($_SESSION['click_count'] == 0) {
		echo "<h1>Готови ли сте?</h1>";
		echo "<h1>Изтеглете начална позиция и броя на ходовете си.</h1>";
		$text_to_render = "Изтегли";
	}
	else if ($_SESSION['click_count'] == 1) {
		echo "<h1>Начална позиция: " . $_SESSION['starting_point'] . "</h1>";
		echo "<h1>Брой на ходовете: " . $_SESSION['turns_count'] . "</h1>";
		echo "<h1>Хвърлете зарчето, за да започнете.</h1>";
		$text_to_render = "Хвърли зарчето";
	}
	else {
		echo "<h1>Вашият резултат е " . $_SESSION['user_points'] . " монети.</h1>";
		echo "<h1>Имате " . $_SESSION['turns_count'] . " хода.</h1>";
		echo "<h1>Закупили сте " . $_SESSION['motels_bought'] . " мотела.</h1>";
		$text_to_render = "Хвърли зарчето";
	}

	echo "<a href=\"play.php\" class=\"btn btn-outline-primary\">" . $text_to_render . "</a>";
}

function check_for_win_or_lose()
{
	if ($_SESSION['user_has_lost_because_of_turns']) {
		echo "<h2>Загубихте, защото останахте с 0 хода.</h2>";
		echo "<h2>Имате " . $_SESSION['user_points'] . " монети.</h2>";
		echo "<a href=\"partials/reset.php\" class=\"btn btn-outline-success\">Играй!</a>";
	}
	else if ($_SESSION['user_has_lost_because_of_money']) {
		echo "<h2>Загубихте, защото останахте с 0 монети.</h2>";
		echo "<a href=\"partials/reset.php\" class=\"btn btn-outline-success\">Играй!</a>";
	}
	else if ($_SESSION['user_has_won_because_of_motels']) {
		echo "<h2>Вие спечелихте играта, понеже притежавате всички мотели!</h2>";
		echo "<h2>Имате резултат от " . $_SESSION['user_points'] . " монети.</h2>";
		echo "<h2>Брой мотели: " . $_SESSION['motels_bought'] . ".</h2>";
		echo "<a href=\"partials/reset.php\" class=\"btn btn-outline-success\">Играй!</a>";
	}
	else if ($_SESSION['user_has_won_because_of_vso']) {
		echo "<h2>Вие спечелихте играта с подкрепата на Враца Софтуер Общество!</h2>";
		echo "<h2>Имате резултат от " . $_SESSION['user_points'] . " монети.</h2>";
		echo "<a href=\"partials/reset.php\" class=\"btn btn-outline-success\">Играй пак!</a>";
	}
}

function skipping_turn_message()
{
	echo "<h2>Пропускате ход заради бурята.</h2>";
	echo "<h1>Вашият резултат е " . $_SESSION['user_points'] . " монети.</h1>";
	echo "<h1>Имате " . $_SESSION['turns_count'] . " хода.</h1>";
	echo "<h1>Закупили сте " . $_SESSION['motels_bought'] . " мотела.</h1>";
	echo "<a href=\"play.php\" class=\"btn btn-outline-primary\">Добре</a>";
}
