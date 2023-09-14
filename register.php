<?php 
	session_start();
	
	if(isset($_SESSION['login'])){
		header("Location:index.php");
	}else{
		require_once 'config/config.php';
		if(isset($_POST["create"])) {
			$user = $_POST["username"];
			$pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
			
			$create = mysqli_query($conn,"INSERT INTO admin VALUES(NULL,'$user','$pass')");

			if($create) {
				header("Location:register.php?status=success");
			}else{
				header("Location:register.php?status=failed");
			}

		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Buat Akun</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="container my-5">
		<div class="row">
			<div class="col">
				<div class="card shadow-lg p-5 border-0">
				  <div class="card-body px-0 py-4">
				    <div class="row d-flex justify-content-center">
				    	<div class="col-md-6">
				    		<form method="post" action="" class="mt-5">
								<label>Username</label>
								<div class="form-group">
									<div class="input-group">
									<input type="text" name="username" class="form-control" autofocus="true" autocomplete="off" required>
									</div>
								</div>
								<label>Password</label>
								<div class="form-group">
								<div class="input-group">
									<input type="password" name="password" class="form-control" required>
									</div>
								</div>
								<button type="submit" name="create" class="btn btn-block btn-info">Buat akun</button>
							</form>
							<div class="row mt-3">
								<div class="col">
									<?php 
										if(isset($_GET['status'])) :
											if($_GET['status']==='failed') {
									?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
									  <strong>Gagal !</strong> Username sudah digunakan
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>
									<?php 
										}else{
									?>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
									  <strong>Berhasil !</strong> Silahkan login
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>
									<?php
										}
									endif;
									?>
								</div>
							</div>
							<p><a href="login.php" class="text-info">Login</a></p>
							<p class="mt-5 font-weight-light text-center">&copy;Copyright 2020</p>
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>