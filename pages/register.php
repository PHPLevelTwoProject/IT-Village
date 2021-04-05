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
                        <p>Регистритай се</p>
                        <hr/>
                    </div>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Потребителско име</label>
                            <input type="text" class="form-control" id="username" name="username"
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
                        <div class="form-group">
                            <label for="repeat-password">Повторете паролата</label>
                            <input type="password" name="repeat_password" class="form-control" id="repeat-password"
                                   placeholder="Повторете вашата парола">
                            <small class="text-muted">Позволени са само букви и цифри</small>
                        </div>
                        <br>
                        <input type="submit" name="submit" class="btn btn-outline-primary" value="Регистритай се">
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
if (isset($_POST['submit'])) {
	$flag = 'check ok';
	if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) &&
		preg_match('/^[a-zA-Z0-9]+$/', $_POST['password']) &&
		preg_match('/^[a-zA-Z0-9]+$/', $_POST['repeat_password'])) {

		$user = $_POST['username'];
		$pass = $_POST['password'];
		$repeat_pass = $_POST['repeat_password'];

		if (getenv('environment') == 'production') {
			$sql = "SELECT `username`,`password` FROM `heroku_6b647d0a28c075b`.`users` WHERE `date_deleted` IS NULL";
		} else {
			$sql = "SELECT `username`,`password` FROM `itvillage`.`users` WHERE `date_deleted` IS NULL";
		}

		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			if ($user == $row['username']) {
				echo "<div class='text-center'><h1>Има потребител с това име.</h1></div>";
				$flag = 'check error';
			}
		}
	} else {
		echo "<div class='text-center'><h1>Моля, въведете само букви и цифри.</h1></div>";
		$flag = 'check error';
	}
	if ($_POST['password'] != $_POST['repeat_password']) {
		echo "<div class='text-center'><h1>Моля, въведете еднаква парола.</h1></div>";
		$flag = 'check error';
	}
	if ($flag == 'check ok') {
		$date = date("Y-m-d");

		// hashing the user's password with secure algorithm so if the db gets dumped the data is secure and cannot be de-hashed
		// hashing uses one-way functions
		$password_hashed = hash('sha512', $pass);

		if (getenv('environment') == 'production') {
			$add_sql = "INSERT INTO `heroku_6b647d0a28c075b`.`users`(`username`, `password`,`date_created` ) 
                        VALUES ('$user', '$password_hashed', '$date')";
		} else {
			$add_sql = "INSERT INTO `itvillage`.`users`(`username`, `password`,`date_created` ) 
                        VALUES ('$user', '$password_hashed', '$date')";
		}

		$add_result = mysqli_query($connection, $add_sql);

		if ($add_result) {
			echo "<div class='text-center'><h1>Успешна регистрация. <a href='login.php'>Вход</а>.</h1></div>";
		} else {
			echo 'error';
		}
	}
}

include './partials/footer.php';
   