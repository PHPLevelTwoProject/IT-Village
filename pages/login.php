<?php

/**
 * @var object $connection
 */
include './partials/header.php';

?>

<main id="main">
    <section id="project" class="project">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-sm-10 offset-sm-1 col-md-6 offset-md-3 text-center">
                    <div class="section-header padded-top">
                        <p>Влез</p>
                        <hr/>
                    </div>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Потребителско име</label>
                            <input type="text" name="username" class="form-control" id="username"
                                   placeholder="Вашето потребителско име">
                            <small class="text-muted">Позволени са само букви и цифри</small>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="password">Парола</label>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Вашата парола">
                            <small class="text-muted">Позволени са само букви и цифри</small>
                        </div>
                        <br>
                        <input type="submit" name="submit" class="btn btn-outline-primary" value="Влез">
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
if (isset($_POST['submit'])) {
	if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST['password'])) {

	    // use remote database if the environment is production
		if (getenv('environment') == 'production') {
			$sql = "SELECT `username`,`password` FROM `heroku_6b647d0a28c075b`.`users` WHERE `date_deleted` IS NULL";
		} else {
			$sql = "SELECT `username`,`password` FROM `itvillage`.`users` WHERE `date_deleted` IS NULL";
		}

		$result = mysqli_query($connection, $sql);

		$user = $_POST['username'];
		$pass = $_POST['password'];

		// hashing on user login and comparing our version with the one from the database
		$password_hashed = hash('sha512', $pass);

		while ($row = mysqli_fetch_assoc($result)) {
			if ($user == $row['username'] && $password_hashed == $row['password']) {
				$_SESSION['user'] = $user;
				break;
			}
		}
		if (isset($_SESSION['user'])) {
			echo "<div class='text-center'><h1>Успешен вход. <a href='play.php'>Играй</а>.</h1></div>";
//			header('location: play.php');
		} else {
			echo "<div class='text-center'><h1>Грешно име или парола.</h1></div>";
		}
	} else {
		echo "<div class='text-center'><h1>Моля въведете само букви и цифри.</h1></div>";
	}
}

include './partials/footer.php';
   