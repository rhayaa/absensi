<?php 

	session_start();
	require 'config/config.php';

	if(!isset($_SESSION['login'])){
		header("Location: login.php");
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aplikasi Absensi</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
		<div class="container-fluid">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <img src="">
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav ml-auto pr-0">
		      <li class="nav-item">
		        <a class="nav-link text-info"><?php echo $_SESSION['username'] ?></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link text-dark" href="act.php?act=logout">Logout</a>
		      </li>
		    </ul>
		  </div>
	  </div>
	</nav>

	<!-- Sidenav -->
	<div class="row mt-3 mx-2">
		<div class="col-md-3 mb-5">
			<div class="card border-0 shadow-sm pb-5">
			  <div class="card-header bg-danger text-white">
			    <h3 class="lead my-0">Aplikasi Absensi</h3>
			  </div>
			  <ul class="list-group list-group-flush font-weight-light">
			    <a href="?page=dashboard" class="text-decoration-none text-info"><li class="list-group-item">Dashboard</li></a>
			    <a href="?page=data-siswa" class="text-decoration-none text-info"><li class="list-group-item">Data Siswa</li></a>
			    <a href="?page=data-absen" class="text-decoration-none text-info"><li class="list-group-item">Data Absensi</li></a>
			  </ul>
			</div>
		</div>

		<!-- Content -->
		<div class="col-md-9">
			<?php 
				if(isset($_GET['page'])) {
			
				$page = $_GET['page'];

				switch ($page) {
					case 'dashboard':
						include 'dashboard.php';
						break;

					case 'data-admin':
						include 'data_admin.php';
						break;

					case 'data-siswa':
						include 'data_siswa.php';
						break;

					case 'add-siswa':
						include 'form_add_siswa.php';
						break;

					case 'edit-siswa':
						include 'form_edit_siswa.php';
						break;

					case 'data-absen':
						include 'data_absen.php';
						break;
					
					case 'detail-absensi':
						include 'detail_absensi.php';
						break;

					case 'add-absensi':
						include 'form_add_absen.php';
						break;

					case 'edit-absensi':
						include 'form_edit_absen.php';
						break;

					case 'detail-pertemuan':

						include 'detail_pertemuan.php';
						break;
					default:
						include '404.php';
						break;
				}
			}else{
				include 'welcome.php';
			}
			?>
		</div>
	</div>

	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>