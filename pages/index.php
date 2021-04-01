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
          <li><a class="nav-link active" href="#">Начало</a></li>
            <li><a class="nav-link" href="#description">Описание</a></li>
            <li><a class="nav-link" href="rules.php">Правила</a></li>
            <li><a class="nav-link" href="statistics.php">Статистики</a></li>
            <!--            --><?php
//            $logged_in = false;
//            if ($logged_in) { ?>
                <li><a class="nav-link" href="play.php">Играй</a></li>
<!--            --><?php //} ?>
            <li><a class="nav-link" href="login.php">Влез</a></li>
            <li><a class="nav-link" href="register.php">Регистрирай се</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
  <!-- ======= End Header ======= -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center ">
    <div class="container ">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">PHP Project Level Two</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">IT Village</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="login.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Влез & Играй</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>

          </div>
        </div>
          <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="imagesameground/gameground_state_10.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- ======= End Hero Section ======= -->

  <main id="main">

      <!-- ======= Project Section ======= -->
      <section id="project" class="project">
          <div class="container" data-aos="fade-up">
              <header class="section-header">
                  <h2>Описание на проекта</h2>
                  <p>Резлизация</p>
              </header>
              <div class="row">
                  <div class="col-lg-12 text-center">
                      Как реализирахме проекта, описание.
                  </div>
              </div>
          </div>
      </section>
      <!-- ======= End Project Section ======= -->

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

  </main>

<?php

include './partials/footer.php';

?>
