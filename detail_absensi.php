<?php

	if (isset($_GET["grade"])) {
		$grade = $_GET["grade"];

		$res = mysqli_query($conn, "SELECT *, COUNT(*) AS hadir, absensi.id AS id_absen FROM absensi INNER JOIN siswa ON absensi.id_siswa=siswa.id AND siswa.kelas='$grade' GROUP BY pertemuan");

	}
	$count = mysqli_num_rows($res);
?>
<div class="row mb-3">
	<div class="col">
		<h3 class="font-weight-light">Detail Absensi Kelas <?= isset($grade) ? $grade : "" ?></h3>
	</div>
</div>

<div class="row">
	<div class="col">
		<a href="?page=data-absen" class="btn btn-info text-white font-weight-light" role="button">Daftar Kelas</a>
		<a href="?page=add-absensi&grade=<?= $grade ?>" class="btn btn-success text-white font-weight-light" role="button">Tambah Absen</a>
	</div>
</div>

<!-- Notifikasi -->
<div class="row">
	<div class="col">
		<?php 
			if(isset($_GET['status'])) :
				if($_GET['status']==='success') {
		?>
		<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
		  <strong>Berhasil !</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<?php 
			}else{
		?>
		<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
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

<div class="row mt-2 ">
	<div class="col">
		<table class="table shadow-sm ">
		  <thead class="bg-danger text-white">
		    <tr>
		      <th scope="col">No.</th>
		      <th scope="col">Kelas</th>
		      <th scope="col">Pertemuan</th>
		      <th scope="col">Tanggal</th>
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
		      <th scope="row"><?= $no++ ?></th>
		      <td><?= $data["kelas"] ?></td>
		      <td><?= $data["pertemuan"] ?></td>
		      <td><?= $data["tanggal"] ?></td>
		      <td class="text-center">
		      	<a class="btn btn-info btn-sm font-weight-light text-white" href="?page=detail-pertemuan&temu=<?= $data['pertemuan'] ?>&grade=<?= $data['kelas']  ?>" role="button">Lihat</a>
		      	<a class="btn btn-warning btn-sm font-weight-light text-white" href="?page=edit-absensi&temu=<?= $data['pertemuan'] ?>&grade=<?= $data['kelas']  ?>" role="button">Ubah</a>
		      	<a class="btn btn-danger btn-sm font-weight-light" href="act.php?act=delete-absensi&temu=<?= $data['pertemuan'] ?>&grade=<?= $data['kelas']  ?>" role="button" onclick="return confirm('Yakin mau dihapus ? Semua absensi di pertemuan ini akan terhapus ')">Hapus</a>
		      </td>
		    </tr>
			<?php 
					endwhile;
				}else{
			?>
			<tr>
				<td colspan="5"><p class="text-center font-weight-bold text-danger">Belum ada absensi</p></td>
			</tr>
			<?php } ?>
		  </tbody>
		</table>
	</div>
</div>