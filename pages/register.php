<?php
    include './partials/header.php';
?>


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
			<div class="section-header">
				<p>Регистритай се</p>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<form action="" method="POST">
						<div class="form-group">
							<label for="username">Потребителско име</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="въведете само букви и цифри">
						</div><br>
						<div class="form-group">
							<label for="password">Парола</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="въведете само букви и цифри">
						</div><br>
						<div class="form-group">
							<label for="repeat-password">Повторете паролата</label>
							<input type="password" name="repeat_password" class="form-control" id="repeat-password" placeholder="въведете само букви и цифри">
						</div><br>
						<input type="submit" name="submit" class="btn btn-primary" value="Регистритай се">
					</form>
				</div>
			</div>
		</div>
	</section>	
</main>

<?php
if(isset($_POST['submit'])){
	$flag = 'check ok';
	if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['username']) &&  preg_match('/^[a-zA-Z0-9]+$/',$_POST['password']) &&  preg_match('/^[a-zA-Z0-9]+$/',$_POST['repeat_password'])){
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$repeat_pass = $_POST['repeat_password'];
		$sql = "SELECT `username`,`password` FROM `users` WHERE `date_deleted` IS NULL";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			if($user == $row['username'] ){
				echo 'Има потребител с това име.';
				$flag = 'check error';
			}
		}	
	}else{
		echo 'Моля въведете само букви и цифри';
		$flag = 'check error';
	}
	if($_POST['password'] != $_POST['repeat_password']){
		echo 'Моля въведете еднаква паролата';
		$flag = 'check error';
	}
	if($flag == 'check ok'){
		$date = date("Y-m-d");
		$add_sql = "INSERT INTO `users`(`username`, `password`,`date_created` ) VALUES ('$user', '$pass', '$date')";
		$add_result = mysqli_query($conn, $add_sql);
		if($add_result){
			echo "Успешна регистрация "; 
		echo "<a href='login.php'>Вход</а>";
		}else{
			echo 'error';
		}
	}
}

    include './partials/footer.php';
   