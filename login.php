<?php
    include './partials/head.php';
?>


<main id="main">
	<section id="project" class="project">
		<div class="container" data-aos="fade-up">
			<div class="section-header">
				<p>Влез</p>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<form action="" method="POST">
						<div class="form-group">
							<label for="username">Потребителско име</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Потребителско име">
						</div><br>
						<div class="form-group">
							<label for="password">Парола</label>
							<input type="password" name="pass" class="form-control" id="password" placeholder="Парола">
						</div><br>
						<input type="submit" name="submit" class="btn btn-primary" value="Влез">
					</form>
				</div>
			</div>
		</div>
	</section/>
</main>

<?php

include './partials/footer.php';
=======
if(isset($_POST['submit'])){
	if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['username']) &&  preg_match('/^[a-zA-Z0-9]+$/',$_POST['pass'])) {
		$sql = "SELECT `name`,`password` FROM `users`";
		$result = mysqli_query($conn, $sql);
		$user = $_POST['username'];
		$pass = $_POST['pass'];
		while($row = mysqli_fetch_assoc($result))	{
			if($user == $row['name'] && $pass == $row['password']){
				$_SESSION['user'] = $user;
				header('location: play.php');
				break;
			}else{
				echo 'Грешно име или парола';
			}
		}
	}else{
		echo 'Моля въведете само букви и цифри';
	}
}
	
    include './partials/footer.php';
    include './partials/scripts.php';
?>

