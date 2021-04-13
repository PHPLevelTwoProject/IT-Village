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
                            <input type="text" class="form-control" id="username" name="username">
                            <small class="text-muted">Позволени са само букви и цифри</small>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="password">Парола</label>
                            <input type="password" name="password" class="form-control" id="password">
                            <small class="text-muted">Позволени са само букви и цифри</small>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="repeat-password">Повторете паролата</label>
                            <input type="password" name="repeat_password" class="form-control" id="repeat-password">
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

if (isset($_POST['submit']) && $connection) {
	register($connection);
}

function register($connection)
{
	$flag = 'check ok';
	if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) &&
		preg_match('/^[a-zA-Z0-9]+$/', $_POST['password']) &&
		preg_match('/^[a-zA-Z0-9]+$/', $_POST['repeat_password'])) {
		$user = htmlspecialchars($_POST['username']);
		$pass = htmlspecialchars($_POST['password']);
		$repeat_pass = htmlspecialchars($_POST['repeat_password']);

		if (getenv('environment') == 'production') {
			$sql = "SELECT `username` FROM `heroku_6b647d0a28c075b`.`users` WHERE `username` = '$user' LIMIT 1";
		} else {
			$sql = "SELECT `username` FROM `itvillage`.`users` WHERE `username` = '$user' LIMIT 1";
		}

		if (isset($connection)) {
			$result = mysqli_query($connection, $sql);
		} else {
			$result = null;
		}

		if (mysqli_num_rows($result) > 0) {
			$flag = 'error name';
		} else {
			if ($pass != $repeat_pass) {
				$flag = 'error pass';
			}
		}
	} else {
		$flag = 'check error';
	}

	if ($flag == 'check error') {
		echo "<div class='text-center'><h1>Моля, въведете само букви и цифри.</h1></div>";
	} elseif ($flag == 'error name') {
		echo "<div class='text-center'><h1>Има потребител с това име.</h1></div>";
	} elseif ($flag == 'error pass') {
		echo "<div class='text-center'><h1>Моля, въведете еднаква парола.</h1></div>";
	} else {
		$password_hashed = password_hash($pass, PASSWORD_DEFAULT);
		$date = date("Y-m-d");

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
			echo "<div class='text-center'><h1>Неуспешна регистрация.</h1></div>";
		}
	}
}

include './partials/footer.php';
   