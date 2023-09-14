<?php
	$resSiswa = mysqli_query($conn, "SELECT * FROM siswa");
	$countSis = mysqli_num_rows($resSiswa);

	$resAdm = mysqli_query($conn, "SELECT * FROM admin");
	$countAdm = mysqli_num_rows($resAdm);
?>
<div class="row mb-3">
	<div class="col">
		<h3 class="font-weight-light">Dashboard</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="card border-0 shadow-sm">
		  <div class="card-header bg-warning text-white">
		    <h3 class="lead">Admin</h3>
		  </div>
		  <ul class="list-group list-group-flush py-5">
		    <li class="list-group-item"><h1 class="text-center text-warning"><?= $countAdm; ?></h1></li>
		  </ul>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card border-0 shadow-sm">
		  <div class="card-header bg-success text-white">
		    <h3 class="lead">Siswa</h3>
		  </div>
		  <ul class="list-group list-group-flush py-5">
		    <li class="list-group-item"><h1 class="text-center text-success"><?= $countSis; ?></h1></li>
		  </ul>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card border-0 shadow-sm">
		  <div class="card-header bg-dark text-white">
		    <h3 class="lead">Tanggal</h3>
		  </div>
		  <ul class="list-group list-group-flush py-5">
		    <li class="list-group-item">
		    	<h1 class="text-center text-dark">
		    		<?php 
						echo date("d/m/Y");
					 ?>
		    	</h1>
		    </li>
		  </ul>
		</div>
	</div>
</div>