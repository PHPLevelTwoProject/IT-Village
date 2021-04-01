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
				<p>Влез</p>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<form action="" method="POST">
						<div class="form-group">
							<label for="username">Потребителско име</label>
							<input type="text" name="username" class="form-control" id="username"  placeholder="въведете само букви и цифри">
						</div><br>
						<div class="form-group">
							<label for="password">Парола</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="въведете само букви и цифри">
						</div><br>
						<input type="submit" name="submit" class="btn btn-primary" value="Влез">
					</form>
				</div>
			</div>
		</div>
	</section/>
</main>

<?php
if(isset($_POST['submit'])){
	if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['username']) &&  preg_match('/^[a-zA-Z0-9]+$/',$_POST['password'])) {
		$sql = "SELECT `username`,`password` FROM `users` WHERE `date_deleted` IS NULL";
		$result = mysqli_query($conn, $sql);
		$user = $_POST['username'];
		$pass = $_POST['password'];
		while($row = mysqli_fetch_assoc($result))	{
			if($user == $row['username'] && $pass == $row['password']){
				$_SESSION['user'] = $user;
				break;
			}
		}
		if(isset($_SESSION['user'])){
			header('location: play.php');
		}else{
			echo 'Грешно име или парола';
		}
	}else{
		echo 'Моля въведете само букви и цифри';
	}
}
	
    include './partials/footer.php';
   