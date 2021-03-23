<?php

include 'partials/head.php';

?>

<body>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
	<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
		<a href="index.php" class="logo d-flex align-items-center">
			<img src="assets/img/village-logo.png" alt="">
			<span>IT Village</span>
		</a>
		<nav id="navbar" class="navbar">
			<ul>
                <li><a class="nav-link" href="./index.php">Начало</a></li>
                <li><a class="nav-link" href="./play.php">Играй</a></li>
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
			<header class="section-header">
			</header>
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="" data-aos="zoom-out" data-aos-delay="200">
						<?php if (!$_SESSION['user_has_won_because_of_vso']) { ?>
							<p>Не е яко да мамиш! Не си спечелил наистина. :)</p>
							<a href="./play.php" class="btn btn-outline-success">Играй!</a>
						<?php } else { ?>
							<h2>Вие спечелихте играта с подкрепата на Враца Софтуер Общество!</h2>
							<h1>Имате резултат от <?= $_SESSION['user_points'] ?> монети.</h1>
							<a href="./partials/reset.php" class="btn btn-outline-success">Играй пак!</a>
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
