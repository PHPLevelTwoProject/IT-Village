<?php

/**
 * @var object $connection
 */
include './partials/header.php';

if ($_SESSION['should_not_render_register'] == true) { ?>
    <main id="main">
        <section id="project" class="project padded-top">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <p>Влезте, за да игратете.</p>
                </div>
            </div>
        </section>
    </main>
<?php } else { ?>
    <main id="main">
    <section id="project" class="project">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
            <p>Регистритай се</p>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Потребителско име</label>
                            <input type="text" class="form-control" id="username" name="username"
                                   placeholder="въведете само букви и цифри">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="password">Парола</label>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="въведете само букви и цифри">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="repeat-password">Повторете паролата</label>
                            <input type="password" name="repeat_password" class="form-control" id="repeat-password"
                                   placeholder="въведете само букви и цифри">
                        </div>
                        <br>
                        <input type="submit" name="submit" class="btn btn-primary" value="Регистритай се">
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php

}

if (isset($_POST['submit'])) {
	$flag = 'check ok';

	if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST['password']) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST['repeat_password'])) {

		$user = $_POST['username'];
		$pass = $_POST['password'];
		$repeat_pass = $_POST['repeat_password'];
		$sql = "SELECT `username`,`password` FROM `itvillage`.`users` WHERE `date_deleted` IS NULL";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			if ($user == $row['username']) {
				echo "<script>alert('Има потребител с това име.')</script>";
				$flag = 'check error';
			}
		}
	} else {
		echo "<script>alert('Моля, въведете валидни данни. Само букви и цифри са допустими.')</script>";
		$flag = 'check error';
	}
	if ($_POST['password'] != $_POST['repeat_password']) {
		echo "<script>alert('Моля, въведете еднаква парола за потвърждение.')</script>";
		$flag = 'check error';
	}
	if ($flag == 'check ok') {
		$date = date("Y-m-d");
		// $add_sql = "INSERT INTO `users`(`username`, `password`,`date_created` ) VALUES ('$user', '$pass', '$date')";

        // hashing the user's password with secure algorithm so if the db gets dumped the data is secure and cannot be dehashed
        // hashing uses one-way functions
		$password_hashed = hash('sha512', $pass);

		$add_sql = "INSERT INTO `itvillage`.`users`(`username`, `password`, `date_created` ) VALUES ('$user', '$password_hashed', '$date')";
		$add_result = mysqli_query($connection, $add_sql);

		if ($add_result) {
			echo "<script>alert('Успешна регистрация! </script>";
			$_SESSION['user'] = $_POST['username'];
			$_SESSION['should_not_render_register'] = true;
		} else {
			echo "<script>alert('Стана грешка. Опитайте отново.')</script>";
		}
	}
}

include './partials/footer.php';
   