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
                            <input type="text" name="username" class="form-control" id="username">
                            <small class="text-muted">Позволени са букви ( A-Z ,a-z ), цифри ( 0-9 ) и символи ( !@_#$%^*& ) </small>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="password">Парола</label>
                            <input type="password" name="password" class="form-control" id="password">
                            <small class="text-muted">Позволени са букви ( A-Z, a-z ), цифри ( 0-9 ) и символи ( !@_#$%^*& )</small>
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
	if (preg_match('/^[a-zA-Z0-9!@#$_%^&*]+$/', $_POST['username']) &&
        preg_match('/^[a-zA-Z0-9!@#$_%^&*]+$/', $_POST['password'])) {
		$user = htmlspecialchars($_POST['username']);
		$pass = htmlspecialchars($_POST['password']);	
		$sql = "`users` WHERE `username` = '$user' AND `date_deleted` IS NULL LIMIT 1";
		
	    // use remote database if the environment is production
		if (getenv('environment') == 'production') {
			$sql_user = "SELECT `username` FROM `heroku_6b647d0a28c075b`.$sql";
		} else {
			$sql_user = "SELECT `username` FROM `itvillage`.$sql";
		}
		
		$result_user = mysqli_query($connection, $sql_user);
		if (mysqli_num_rows($result_user) > 0) {
			if (getenv('environment') == 'production') {
				$sql_pass = "SELECT `password` FROM `heroku_6b647d0a28c075b`.$sql";
			} else {
				$sql_pass = "SELECT `password` FROM `itvillage`.$sql";
			}
			
			$result_pass = mysqli_query($connection, $sql_pass);
			$row = mysqli_fetch_assoc($result_pass);
			$db_pass = $row['password'];
			
			if (password_verify($pass, $db_pass)) {
				$_SESSION['user'] = $user;
				echo '<script>window.location="index.php?logged" </script>';
			} else {
				echo "<div class='text-center'><h1>Грешна парола.</h1></div>";
			}
		} else {
			echo "<div class='text-center'><h1>Грешен потребител.</h1></div>";
			}
	} else {
		echo "<div class='text-center'><h1>Моля, въведете само букви ( A-Z , a-z ), цифри ( 0-9 ) и символи ( !@_#$%^*& )</h1></div>";
	}
}

include './partials/footer.php';
   