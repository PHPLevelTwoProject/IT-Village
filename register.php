<?php
    include './partials/head.php';
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
                <li><a class="nav-link active" href="./login.php">Влез</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
<!-- ======= End Header ======= -->

<!-- ======= Placeholder Section ======= -->
<section id="" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
        </div>
    </div>
</section>
<!-- ======= End Placeholder Section ======= -->

<main id="main">
<section id="project" class="project">
    <div class="container" data-aos="fade-up">
    <header class="section-header">
        <p>Регистритай се</p>
    </header>
    <div class="row">
    <div class="col-lg-12 text-center">
        <form action="">
            <div class="form-group">
                <label for="username">Потребителско име</label>
                <input type="email" class="form-control" id="username"
                       aria-describedby="username" placeholder="Потребителско име">
            </div>
            <br>
            <div class="form-group">
                <label for="password">Парола</label>
                <input type="password" class="form-control" id="password" placeholder="Парола">
            </div>
            <br>
            <div class="form-group">
                <label for="repeat-password">Повторете паролата</label>
                <input type="password" class="form-control" id="repeat-password" placeholder="Повторете паролата">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Регистритай се</button>
        </form>
    </div>
    </div>
    </div>
</section>
</main>

<?php

include './partials/footer.php';
