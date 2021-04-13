<?php

include './partials/header.php';

if (!isset($_SESSION['user'])) {
	header('Location: login.php');
}

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

?>

<main id="main">
    <section id="project" class="project">
        <div class="container" data-aos="fade-up">
            <div class="row padded-top-five">
                <div class="col-lg-12 text-center">
                    <div class="" data-aos="zoom-out" data-aos-delay="200">
						<?php
						include './partials/ground_renderer.php';
						include './partials/points_logic.php';
						?>
                    </div>
                    <form action="">
						<?php
						if ($_SESSION['user_has_lost_because_of_turns'] || $_SESSION['user_has_lost_because_of_money'] ||
							$_SESSION['user_has_won_because_of_motels'] || $_SESSION['user_has_won_because_of_vso']) {
							check_for_win_or_lose();
						} else {
							user_interface();
						}
						?>
                    </form>
                    <br>
                    <div class="" data-aos="zoom-out" data-aos-delay="200">
						<?php
						include './partials/dice_renderer.php';
						?>
                    </div>
                    <div class="" data-aos="zoom-out" data-aos-delay="200">
						<?php
						if ($_SESSION['click_count'] != 0 && $_SESSION['click_count'] != 1) {
							echo "<a href='./partials/reset.php' class='btn btn-outline-danger'>Занули резултат</a>";
						}
						?>
                    </div>
					<?php $_SESSION['click_count'] += 1; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php

include './partials/footer.php';

?>

