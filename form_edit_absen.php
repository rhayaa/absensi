<?php

	if (isset($_GET["grade"])) {
		$grade = $_GET["grade"];
		$temu = $_GET["temu"];
		$res = mysqli_query($conn, "SELECT * FROM siswa INNER JOIN absensi ON siswa.id=absensi.id_siswa AND absensi.kelas='$grade' AND pertemuan=$temu");

		$date = mysqli_query($conn, "SELECT tanggal FROM absensi WHERE kelas='$grade' AND pertemuan=$temu");

		$tgl = mysqli_fetch_assoc($date);
	}

?>
<div class="row mb-3">
	<div class="col">
		<h3 class="font-weight-light">Absensi</h3>
	</div>
</div>
<div class="row mb-5">
	<div class="col">
		<div class="card border-0 shadow-sm">
		  <div class="card-header bg-danger text-white">
		    <h3 class="lead my-0">Update Absensi Kelas <?= $grade ?></h3>
		  </div>
		  <form action="act.php?act=update-absensi" method="post">
			  <table class="table table-striped mb-0 font-weight-light">
			  	<tr>
			  		<th width="33%">
			  			<div class="form-group">
						    <label for="temu">Pertemuan</label>
						    <input type="number" class="form-control" name="temu" id="temu" min="1" max="20" value="<?= $temu ?>" readonly>
						</div>
			  		</th>
			  		<th>
			  			<input type="hidden" name="grade" value="<?= $grade ?>">
			  		</th>
			  		<th>
			  			<div class="form-group">
			  				<label>Tanggal</label>
						    <input type="text" class="form-control" name="tgl" value="<?= $tgl['tanggal']  ?>" readonly="readonly">
						</div>
			  		</th>
			  	</tr>
			  	<?php 
			  		if(mysqli_num_rows($res) > 0){
			  			while($data = mysqli_fetch_assoc($res)) :
			  	?>
			  	<tr>
			  		<td><input type="hidden" name="id[]" value="<?= $data['id_siswa'] ?>"><?= $data["nama"] ?></td>
			  		<td>
			  			<div class="form-group">
						    <select name="hadir[]" class="form-control">
						    	<option value="hadir" <?= $data["kehadiran"] == 'hadir' ? "selected" : "" ?>>Hadir</option>
						    	<option value="izin" <?= $data["kehadiran"] == 'izin' ? "selected" : "" ?>>Izin</option>
						    	<option value="alfa" <?= $data["kehadiran"] == 'alfa' ? "selected" : "" ?>>Alfa</option>
						    </select>
						</div>
			  		</td>
			  		<td>
			  			<input type="text" class="form-control font-weight-light" name="ket[]" placeholder="Keterangan diisi bagi yang izin..." value="<?= $data['ket'] ?>">
			  		</td>
			  	</tr>
			    <?php
				    	endwhile;
				    }
			    ?>
			    <tr>
			    	<td colspan="2"></td>
			    	<td align="right">
			    		<a href="?page=detail-absensi&grade=<?= $grade ?>" class="btn btn-secondary">Kembali</a>
			    		<button type="submit" name="save" class="btn btn-info">Update</button>
			    	</td>
			    </tr>
			  </table>
		  </form>
		</div>
	</div>
</div>