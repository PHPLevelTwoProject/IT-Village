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
				<?php if ($_SESSION['user_has_lost_because_of_turns']) { ?>
					<h2>Загубихте, защото останахте с 0 хода.</h2>
					<h2>Имате <?= $_SESSION['user_points'] ?> монети.</h2>
					<a href="partials/reset.php" class="btn btn-outline-success">Играй!</a>
				<?php } else if ($_SESSION['user_has_lost_because_of_money']) { ?>
					<h2>Загубихте, защото останахте с 0 монети.</h2>
					<a href="partials/reset.php" class="btn btn-outline-success">Играй!</a>
				<?php } ?>
			</div>
			</div>
			</div>
		</div>
	</section>
</main>


<?php

include './partials/footer.php';

?>
