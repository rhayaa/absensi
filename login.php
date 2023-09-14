<?php 
	session_start();
	if(isset($_SESSION['login'])){
		header("Location:index.php");
	}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="container my-5">
		<div class="row d-flex justify-content-center">
			<div class="col">
				<div class="card shadow-lg p-5 border-0">
				  <div class="card-body px-0 py-4">
				    <div class="row">
				    	<div class="col-md-6">
				    		<img src="assets/img/Login.png" alt="" height="400">
				    	</div>
				    	<div class="col-md-6">
				    		<form method="post" action="LoginCheck.php" class="mt-5">
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
								<button type="submit" class="btn btn-block btn-info">Login</button>
							</form>
							<div class="row mt-3">
								<div class="col">
									<?php 
										if(isset($_GET['status'])) :
											if($_GET['status']==='failed') :
									?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
									  <strong>Gagal login !</strong> Data tidak terdaftar
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>
									<?php 
										endif;
									endif;
									?>
								</div>
							</div>
							<p><a href="register.php" class="text-info">Buat akun</a></p>
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