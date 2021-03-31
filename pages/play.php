<?php

include './partials/header.php';

?>

<main id="main">
    <section class="project padded-top">
        <div class="container" data-aos="fade-up">
        <div class="row">
        <div class="col-lg-12 text-center">
            <div class="" data-aos="zoom-out" data-aos-delay="200">
                <?php
                include './partials/ground_renderer.php';
                include './partials/points_logic.php';
                ?>
            </div>
            <form action="">
                <?php
                if ($_SESSION['click_count'] == 0) {
                    echo "<h1>Готови ли сте?</h1>";
                    echo "<h1>Изтеглете начална позиция и броя на ходовете си.</h1>";
                    $text_to_render = "Изтегли";
                } else if ($_SESSION['click_count'] == 1) {
                    echo "<h1>Начална позиция: " . $_SESSION['starting_point'] . "</h1>";
                    echo "<h1>Брой на ходовете: " . $_SESSION['turns_count'] . "</h1>";
                    echo "<h1>Хвърлете зарчето, за да започнете.</h1>";
                    $text_to_render = "Хвърли зарчето";
                } else {
                    echo "<h1>Вашият резултат е " . $_SESSION['user_points'] . " монети.</h1>";
                    echo "<h1>Имате " . $_SESSION['turns_count'] . " хода.</h1>";
                    echo "<h1>Закупили сте " . $_SESSION['motels_bought'] . " мотела.</h1>";
                    $text_to_render = "Хвърли зарчето";
                }
                ?>
                <a href="play.php" class="btn btn-outline-primary"><?= $text_to_render ?></a>
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
                <br>
                <br>
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
