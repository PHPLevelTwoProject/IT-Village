<?php

include 'partials/header.php';

?>

<body>
<main id="main">
	<section id="project" class="project">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
        </header>
        <div class="row">
        <div class="col-lg-12 text-center">
        <div class="" data-aos="zoom-out" data-aos-delay="200">
            <?php if (!$_SESSION['user_has_won_because_of_vso'] && !$_SESSION['user_has_won_because_of_motels']) { ?>
                <h2>Не е яко да мамиш! Не си спечелил наистина. :)</h2>
                <a href="partials/reset.php" class="btn btn-outline-success">Играй!</a>
            <?php } else if ($_SESSION['user_has_won_because_of_motels']) { ?>
                <h2>Вие спечелихте играта, понеже притежавате всички мотели!</h2>
                <h2>Имате резултат от <?= $_SESSION['user_points'] ?> монети.</h2>
                <h2>Брой мотели: <?= $_SESSION['motels_bought'] ?>.</h2>
                <a href="partials/reset.php" class="btn btn-outline-success">Играй!</a>
			<?php } else if ($_SESSION['user_has_won_because_of_vso']) { ?>
                <h2>Вие спечелихте играта с подкрепата на Враца Софтуер Общество!</h2>
                <h2>Имате резултат от <?= $_SESSION['user_points'] ?> монети.</h2>
                <a href="partials/reset.php" class="btn btn-outline-success">Играй пак!</a>
            <?php } ?>
        </div>
        </div>
        </div>
    </div>
	</section>
</main>

<!-- ======= PlaceHolders Section ======= -->

<section id="description" class="description">
	<div class="container" data-aos="fade-up">
		<header class="section-header">
		</header>
		<div class="row">
			<div class="col-lg-12 text-center">
			</div>
		</div>
	</div>
</section>
<section id="description" class="description">
	<div class="container" data-aos="fade-up">
		<header class="section-header">
		</header>
		<div class="row">
			<div class="col-lg-12 text-center">
			</div>
		</div>
	</div>
</section>

<!-- ======= End PlaceHolders Section ======= -->

<?php

include './partials/footer.php';

?>
