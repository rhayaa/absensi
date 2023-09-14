<?php
	$res = mysqli_query($conn, "SELECT kelas, COUNT(*) AS total FROM siswa GROUP BY kelas");
?>
<div class="row mb-3">
	<div class="col">
		<h3 class="font-weight-light">Data Absensi</h3>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="card border-0 shadow-sm">
		  <div class="card-header bg-danger text-white">
		    <h3 class="lead my-0">Daftar Kelas</h3>
		  </div>
		  <table class="table table-striped mb-0">
		  	<?php 
		  		if(mysqli_num_rows($res) > 0){
		  			while($data = mysqli_fetch_assoc($res)) :
		  	?>
		  	<tr>
		  		<td><h1 class="lead text-center font-weight-bold"><?= $data["kelas"] ?></h1></td>
		  		<td align="right"><strong class="font-weight-bold"><?= $data["total"] ?></strong> Siswa</td>
		  		<td align="right"><a href="?page=detail-absensi&grade=<?= $data['kelas'] ?>" class="btn btn-info">Lihat Absensi</a></td>
		  	</tr>
		    <?php
			    	endwhile;
			    }
		    ?>
		  </table>
		</div>
	</div>
</div>