<?php
	$id = $_GET['id'];
	$res = mysqli_query($conn,"SELECT * FROM siswa WHERE id=$id");
	$data=mysqli_fetch_assoc($res);
	$ttl = explode(",", $data["ttl"]);
	$tempat = $ttl[0];
	$tgl = $ttl[1];
?>
<div class="row mb-3">
	<div class="col">
		<h3 class="font-weight-light">Update Data Siswa</h3>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="card mb-5 shadow-sm border-0">
		  <p class="card-header bg-danger text-white">Isi Form dengan Benar</p>
		  <div class="card-body font-weight-light">
		  	<form method="post" action="act.php?act=update-siswa">
			  <input type="hidden" class="form-control" name="id" value="<?= $data['id'] ?>">
			  <div class="form-group">
			    <label for="nis">NIS</label>
			    <input type="text" class="form-control" name="nis" id="nis" value="<?= $data['nis'] ?>" autofocus="true" required>
			  </div>
			  <div class="form-group">
			    <label for="nama">Nama</label>
			    <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama'] ?>" required>
			  </div>
			  <div class="form-group">
			    <label for="ttl">Tempat</label>
			    <div class="row">
			    	<div class="col">
			    		<input type="text" class="form-control" name="tempat" id="ttl" value="<?= $tempat ?>" required>
			    	</div>
			    	<div class="col">
			    		<input type="date" class="form-control" name="tgl" value="<?= $tgl ?>" required>
			    	</div>
			    </div>
			  </div>
			  <div class="form-group">
			  	<label for="jkel">Jenis Kelamin</label>
			    <div class="form-check" id="jkel">
				  <input class="form-check-input" type="radio" name="jkel" id="jkel1" value="Laki-laki" <?= $data['jkel'] == "Laki-laki" ? "checked" : "" ?>>
				  <label class="form-check-label" for="jkel1">
				   Laki-laki
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="jkel" id="jkel2" value="Perempuan" <?= $data['jkel'] == "Perempuan" ? "checked" : "" ?>>
				  <label class="form-check-label" for="jkel2">
				    Perempuan
				  </label>
				</div>
			  </div>
			  <div class="form-group">
			    <label for="kelas">Kelas</label>
			    <select name="kelas" id="kelas" class="form-control">
			    	<option value="X" <?= $data["kelas"]=="X" ? "selected" : "" ?>>X</option>
			    	<option value="XI" <?= $data["kelas"]=="XI" ? "selected" : "" ?>>XI</option>
			    	<option value="XII" <?= $data["kelas"]=="XII" ? "selected" : "" ?>>XII</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="nohp">No. HP</label>
			    <input type="text" class="form-control" name="nohp" value="<?= $data['nohp'] ?>" id="nohp">
			  </div>
			  <div class="form-group">
			    <label for="alamat">Alamat</label>
			    <textarea class="form-control" name="alamat" id="alamat" rows="3" resizable="false"><?= $data["alamat"] ?></textarea>
			  </div>
			  <button type="submit" class="btn btn-info font-weight-light">Update</button>
			  <button type="reset" class="btn btn-secondary font-weight-light">Batal</button>
			</form>
		  </div>
		</div>
	</div>
</div>