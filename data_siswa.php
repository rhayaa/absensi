<?php 
	$res = mysqli_query($conn,"SELECT * FROM siswa ORDER BY kelas");
	if (isset($_GET['cari'])) {
		$keyword=$_GET['keyword'];
		$res = mysqli_query($conn,"SELECT * FROM siswa WHERE nama LIKE '%$keyword%' OR nis LIKE '%$keyword%' ORDER BY kelas");
	}
	$count = mysqli_num_rows($res);
?>
<div class="row mb-3">
	<div class="col">
		<h3 class="font-weight-light">Data Siswa</h3>
	</div>
</div>

	<div class="row">
	<div class="col">
		<a href="?page=add-siswa" class="btn btn-success text-white font-weight-light" role="button">Tambah Data</a>
	</div>
	<div class="col">
		<form action="" method="get">
			<div class="input-group mb-3">
			  <input type="hidden" name="page" value="data-siswa">
			  <input type="text" class="form-control" placeholder="Cari Siswa..." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword" autofocus="true">
			  <div class="input-group-append">
			    <button class="btn btn-secondary font-weight-light" type="submit" id="button-addon2" name="cari" value="<?= random_int(0, 1000) ?>">Cari</button>
			  </div>
			</div>
		</form>
	</div>
</div>

<!-- Notifikasi -->
<div class="row">
	<div class="col">
		<?php 
			if(isset($_GET['status'])) :
				if($_GET['status']==='success') {
		?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Berhasil !</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<?php 
			}else{
		?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Gagal !</strong>
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

<div class="row">
	<div class="col">
		<table class="table shadow-sm">
		  <thead class="bg-danger text-white">
		    <tr>
		      <th scope="col">No.</th>
		      <th scope="col">NIS</th>
		      <th scope="col">Nama</th>
		      <th scope="col">Jenis Kelamin</th>
		      <th scope="col">Kelas</th>
		      <th scope="col" class="text-center">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
			  	if($count > 0) {
			  		$no=1;
			  		while($data=mysqli_fetch_assoc($res)) :
		  	?>
		    <tr class="font-weight-light">
		      <th scope="row"><?= $no++; ?></th>
		      <td><?= $data["nis"] ?></td>
		      <td><?= $data["nama"] ?></td>
		      <td><?= $data["jkel"] ?></td>
		      <td><?= $data["kelas"] ?></td>
		      <td class="text-center">
		      	<a class="btn btn-warning btn-sm font-weight-light text-white" href="?page=edit-siswa&id=<?= $data['id'] ?>" role="button">Ubah</a>
		      	<a class="btn btn-danger btn-sm font-weight-light" href="act.php?act=delete-siswa&id=<?= $data['id'] ?>" role="button" onclick="return confirm('Yakin mau dihapus ? ')">Hapus</a>
		      </td>
		    </tr>
			<?php 
					endwhile;
				}else{
			?>
			<tr>
				<td colspan="5"><p class="text-center font-weight-bold text-danger">Tidak ada data</p></td>
			</tr>
			<?php } ?>
		  </tbody>
		</table>
	</div>
</div>