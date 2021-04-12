<?php

include './partials/header.php';
include './partials/points_functions.php';
include './partials/ground_functions.php';
include './partials/dice_functions.php';
include './partials/user_interface_and_game_end.php';
include './partials/increment_position.php';

if (!isset($_SESSION['user'])) {
	header('Location: login.php');
}

?>

<main id="main">
    <section id="project" class="project">
        <div class="container" data-aos="fade-up">
            <div class="row padded-top-five">
                <div class="col-lg-12 text-center">
                    <div class="" data-aos="zoom-out" data-aos-delay="200">
						<?php

						increment_position_at_start();
						correct_position();
						render_ground();
						modify_points();

						?>
                    </div>
                    <form action="">
						<?php
						if ($_SESSION['user_has_lost_because_of_turns'] || $_SESSION['user_has_lost_because_of_money'] ||
							$_SESSION['user_has_won_because_of_motels'] || $_SESSION['user_has_won_because_of_vso']) {
							check_for_win_or_lose();
						} else if ($_SESSION['has_to_skip_two_rounds']) {
							skipping_turn_message();
						} else {
							user_interface();
						}
						?>
                    </form>
                    <br>
                    <div class="" data-aos="zoom-out" data-aos-delay="200">
						<?php
						if (!$_SESSION['has_to_skip_two_rounds']) {
						    render_dice();
                        }
						increment_dice_number();
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

