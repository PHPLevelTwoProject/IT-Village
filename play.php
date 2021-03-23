<?php

include './partials/head.php';

?>

<body>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span>IT Village</span>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link" href="./index.php">Начало</a></li>
                <li><a class="nav-link" href="./statistics.php">Статистики</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
<!-- ======= End Header ======= -->

<main id="main">
<section id="project" class="project">
    <div class="container" data-aos="fade-up">
        <br>
        <br>
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
				$text_to_render = "Започни играта";
            }
            else if ($_SESSION['click_count'] == 1) {
				echo "<h1>Хвърлете зарчето, за да започнете.</h1>";
				$text_to_render = "Хвърли зарчето";
			}
			else {
				echo "<h1>Вашият резултат е: " . $_SESSION['user_points'] . "</h1>";
				$text_to_render = "Хвърли зарчето";
			}
            ?>
            <a href="./play.php" class="btn btn-outline-primary"><?= $text_to_render ?></a>
        </form>
        <br>
        <div class="" data-aos="zoom-out" data-aos-delay="200">
            <?php
            include './partials/dice_renderer.php';
            ?>
        </div>
        <div class="" data-aos="zoom-out" data-aos-delay="200">
            <?php
			if ($_SESSION['click_count'] == 0) {
            }
			else if ($_SESSION['click_count'] == 1) {
			}
			else {
                echo "<a href=\"./partials/reset.php\" class=\"btn btn-outline-danger\">Занули резултат</a>";
            }
            ?>
        </div>
		<?php $_SESSION['click_count'] += 1; ?>
    </div>
    </div>
    </div>

<!-- ======= PlaceHolders Section ======= -->
</section>
    <section id="description" class="description">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
            </header>
        </div>
    </section>
    <section id="description" class="description">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
            </header>
        </div>
    </section>
    <section id="description" class="description">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
            </header>
        </div>
    </section>
    <section id="description" class="description">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
            </header>
        </div>
    </section>
    <!-- ======= End PlaceHolders Section ======= -->
</main>

<?php

include './partials/footer.php';
include './partials/scripts.php';

?>
