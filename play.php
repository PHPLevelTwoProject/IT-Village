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
    <header class="section-header">
    </header>
    <div class="row">
    <div class="col-lg-12 text-center">
        <div class="" data-aos="zoom-out" data-aos-delay="200">
			<?php
			    include './partials/ground_renderer.php'
			?>
        </div>
        <form action="">
            <a href="./play.php" class="btn btn-outline-primary">Хвърли зарчето</a>
        </form>
        <br>
        <div class="" data-aos="zoom-out" data-aos-delay="200">
            <?php
			    include './partials/dice_renderer.php'
            ?>
        </div>
        <div class="" data-aos="zoom-out" data-aos-delay="200">
            <a href="./partials/reset.php" class="btn btn-outline-danger">Занули резултат</a>
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
    include './partials/scripts.php';
?>

