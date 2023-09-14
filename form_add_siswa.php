<div class="row mb-3">
	<div class="col">
		<h3 class="font-weight-light">Tambah Data Siswa</h3>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="card mb-5 shadow-sm border-0">
		  <p class="card-header bg-danger text-white">Isi Form dengan Benar</p>
		  <div class="card-body font-weight-light">
		  	<form method="post" action="act.php?act=add-siswa">
			  <div class="form-group">
			    <label for="nis">NIS</label>
			    <input type="text" class="form-control" name="nis" id="nis" autofocus="true" required>
			  </div>
			  <div class="form-group">
			    <label for="nama">Nama</label>
			    <input type="text" class="form-control" name="nama" id="nama" required>
			  </div>
			  <div class="form-group">
			    <label for="ttl">Tempat, Tanggal Lahir</label>
			    <div class="row">
			    	<div class="col">
			    		<input type="text" class="form-control" name="tempat" id="ttl" required>
			    	</div>
			    	<div class="col">
			    		<input type="date" class="form-control" name="tgl" required>
			    	</div>
			    </div>
			  </div>
			  <div class="form-group">
			  	<label for="jkel">Jenis Kelamin</label>
			    <div class="form-check" id="jkel">
				  <input class="form-check-input" type="radio" name="jkel" id="jkel1" value="Laki-laki" checked>
				  <label class="form-check-label" for="jkel1">
				   Laki-laki
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="jkel" id="jkel2" value="Perempuan">
				  <label class="form-check-label" for="jkel2">
				    Perempuan
				  </label>
				</div>
			  </div>
			  <div class="form-group">
			    <label for="kelas">Kelas</label>
			    <select name="kelas" id="kelas" class="form-control">
			    	<option value="X">X</option>
			    	<option value="XI">XI</option>
			    	<option value="XII">XII</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="nohp">No. HP</label>
			    <input type="text" class="form-control" name="nohp" id="nohp">
			  </div>
			  <div class="form-group">
			    <label for="alamat">Alamat</label>
			    <textarea class="form-control" name="alamat" id="alamat" rows="3" resizable="false"></textarea>
			  </div>
			  <button type="submit" class="btn btn-info font-weight-light">Simpan</button>
			  <button type="reset" class="btn btn-secondary font-weight-light">Batal</button>
			</form>
		  </div>
		</div>
	</div>
</div>