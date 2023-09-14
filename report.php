<?php
session_start();
if (!isset($_SESSION['login'])) {
	echo "Access Denied";
}

require_once 'config/config.php';

if (isset($_GET["grade"])) {
	$grade = $_GET["grade"];
	$temu = $_GET["temu"];

	$res = mysqli_query($conn, "SELECT * FROM absensi INNER JOIN siswa ON absensi.id_siswa=siswa.id AND absensi.kelas='$grade' AND pertemuan=$temu");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Absensi Pertemuan <?= $temu ?></title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<style>
		body{
			padding: 20px 50px;
		}
		table tr td {
			text-transform: capitalize;
		}

		@media print{
			#noprint{
				display: none;
			}
		}
	</style>
</head>
<body>
	<div class="row mb-3">
		<div class="col">
			<h3 class="font-weight-light">Rekap Absensi Kelas <?= isset($grade) ? $grade : "" ?> : <strong>Pertemuan <?= $temu ?></strong></h3>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col">
			<table class="table shadow-sm">
		  <thead class="bg-danger text-white">
		    <tr>
		      <th scope="col">No.</th>
		      <th scope="col">Tanggal</th>
		      <th scope="col">NIS</th>
		      <th scope="col">Nama</th>
		      <th scope="col">Kelas</th>
		      <th scope="col">Kehadiran</th>
		      <th scope="col">Keterangan</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
			  		$no=1;
			  		while($data=mysqli_fetch_assoc($res)) :
		  	?>
		    <tr class="font-weight-light">
		      <th scope="row"><?= $no++ ?></th>
		      <td><?= $data["tanggal"] ?></td>
		      <td><?= $data["nis"] ?></td>
		      <td><?= $data["nama"] ?></td>
		      <td><?= $data["kelas"] ?></td>
		      <td>
		      	<?= $data["kehadiran"] ?>
		      </td>
		      <td>
		      	<?= $data["ket"] == '' ? '-' : $data['ket'] ?>
		      </td>
		    </tr>
			<?php 
					endwhile;
			?>
		  </tbody>
		</table>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<button type="button" class="btn btn-info" id="noprint" onclick="window.print()">Cetak</button>
		</div>
	</div>
</body>
</html>