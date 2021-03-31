<?php

/**
 * @var object $connection
 */
include './partials/header.php';


if ($_SESSION['should_not_render_login'] == true) {
//	header('Location: play.php');
	?>

    <section id="" class="">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
            </header>
            <div class="row">
                <div class="col-lg-12 text-center">
                </div>
            </div>
        </div>
    </section>
    <main id="main">
        <section id="project" class="project">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <p>Вече сте влезнали</p>
                </div>
            </div>
        </section>
    </main>

    <?php
} else {

?>
<main id="main">
    <section id="project" class="project padded-top">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <p>Влез</p>
            </div>
            <div class="row">
            <div class="col-lg-12 text-center">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Потребителско име</label>
                        <input type="text" name="username" class="form-control" id="username"
                               placeholder="въведете само букви и цифри">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password">Парола</label>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="въведете само букви и цифри">
                    </div>
                    <br>
                    <input type="submit" name="submit" class="btn btn-primary" value="Влез">
                </form>
            </div>
            </div>
        </div>
    </section>
</main>

<?php

}

if (isset($_POST['submit'])) {
	if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST['password'])) {

		$query_select_users = "SELECT `user_id`, `username`,`password` FROM `itvillage`.`users` WHERE `date_deleted` IS NULL";
		$result = mysqli_query($connection, $query_select_users);

		$user = $_POST['username'];
		$pass = $_POST['password'];

		// hashing on user login and comparing our version with the one from the database
		$password_hashed = hash('sha512', $pass);

		while ($row = mysqli_fetch_assoc($result)) {
			if ($user == $row['username'] && $password_hashed == $row['password']) {
				$_SESSION['user_id'] = $row['user_id'];

				$_SESSION['user'] = $_POST['username'];
				$_SESSION['should_not_render_login'] = true;
			}
		}

		if (isset($_SESSION['user'])) {
			//header('Location: play.php');
		} else {
			echo "Грешно име или парола";
		}
	} else {
		echo "Моля въведете само букви и цифри";
	}
}

include './partials/footer.php';
   