<?php

	if (isset($_GET["grade"])) {
		$grade = $_GET["grade"];
		$temu = $_GET["temu"];

		$res = mysqli_query($conn, "SELECT * FROM absensi INNER JOIN siswa ON absensi.id_siswa=siswa.id AND absensi.kelas='$grade' AND pertemuan=$temu");

	}
	$count = mysqli_num_rows($res);
?>
<div class="row mb-3">
	<div class="col">
		<h3 class="font-weight-light">Rekap Absensi Kelas <?= isset($grade) ? $grade : "" ?> : <strong>Pertemuan <?= $temu ?></strong></h3>
	</div>
</div>

<div class="row">
	<div class="col">
		<a href="?page=detail-absensi&grade=<?= $grade ?>" class="btn btn-secondary text-white font-weight-light" role="button">Kembali</a>

		<a href="report.php?temu=<?= $temu ?>&grade=<?= $grade ?>" class="btn btn-info text-white font-weight-light" role="button" target="_blank">Laporan</a>
	</div>
</div>

<div class="row mt-2">
	<div class="col">
		<table class="table shadow-sm">
		  <thead class="bg-danger text-white">
		    <tr>
		      <th scope="col">No.</th>
		      <th scope="col">Tanggal</th>
		      <th scope="col">NIS</th>
		      <th scope="col">Nama</th>
		      <th scope="col">Kehadiran</th>
		      <th scope="col">Keterangan</th>
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
		      <td><?= $data["tanggal"] ?></td>
		      <td><?= $data["nis"] ?></td>
		      <td><?= $data["nama"] ?></td>
		      <td>
		      	<span class="badge badge-<?= $data['kehadiran'] == 'hadir' ? 'success' : ($data['kehadiran'] == 'izin' ? 'warning' : 'danger') ?>"><?= $data["kehadiran"] ?></span>
		      </td>
		      <td>
		      	<?= $data["ket"] == '' ? '-' : $data['ket'] ?>
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