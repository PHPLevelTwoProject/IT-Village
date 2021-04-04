<?php

include 'partials/header.php';

?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center ">
<div class="container ">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up">PHP Project Level Two</h1>
      <h2 data-aos="fade-up" data-aos-delay="400">IT Village</h2>
      <div data-aos="fade-up" data-aos-delay="600">
        <div class="text-center text-lg-start">
          <a href="./login.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
            <span>Влез & Играй</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

      </div>
    </div>
      <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
      <img src="./images/gameground/gameground_state_10.png" class="img-fluid" alt="">
    </div>
  </div>
</div>
</section>
<!-- ======= End Hero Section ======= -->

<main id="main">
    <!-- ======= Project Section ======= -->
    <section id="project" class="project spaced">
        <div id="description" class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Описание</p>
                <hr>
            </header>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>
                        Всяка петък вечер група от супер-cool програмисти се събират за да играят любимата си бордова игра - IT Village, реализирана от Тошко и Крис.
                    </p>
                    <p>
                        Действието се развива на дъска за игра с размери 4х4. Позволени за достъпване са само първата и последната колона и първия и последен ред на дъската.
                    </p>
                    <p>
                        Всички останали полета са празни и не може да се играе върху тях.
                    </p>
                    <p>
                        Стартирате играта от входната позиция или от едно от полетата за игра и хвърляте зарчето. Ходовете са по посока на часовниковата стрелка.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= End Project Section ======= -->
</main>

<?php

include './partials/footer.php';

?>
