<?php 
session_start();
require 'config/config.php';

if(!isset($_SESSION['login'])){
	echo "Access Denied";
}else{
	if (isset($_GET['act'])) {

		$act = $_GET['act'];

		switch ($act) {

			case 'add-siswa':

				$nis = $_POST['nis'];
				$nama = $_POST['nama'];
				$jkel = $_POST['jkel'];
				$nohp = $_POST['nohp'];
				$kelas = $_POST['kelas'];
				$alamat = $_POST['alamat'];
				$ttl = $_POST['tempat'].",".$_POST['tgl'];

	        	$save = mysqli_query($conn, "INSERT INTO siswa VALUES(NULL,'$nis','$nama','$ttl','$jkel','$kelas','$alamat','$nohp')");

	        	if ($save) {
					header("Location:index.php?page=data-siswa&status=success");
				}else{
					header("Location:index.php?page=add-siswa");
				}

				break;

			case 'update-siswa':

				$id = $_POST['id'];
				$nis = $_POST['nis'];
				$nama = $_POST['nama'];
				$jkel = $_POST['jkel'];
				$nohp = $_POST['nohp'];
				$kelas = $_POST['kelas'];
				$alamat = $_POST['alamat'];
				$ttl = $_POST['tempat'].",".$_POST['tgl'];

	        	$update = mysqli_query($conn, "UPDATE siswa SET nis='$nis',nama='$nama',ttl='$ttl',jkel='$jkel',kelas='$kelas',alamat='$alamat',nohp='$nohp' WHERE id = '$id' ");

	        	if ($update) {
					header("Location:index.php?page=data-siswa&status=success");
				}else{
					header("Location:index.php?page=edit-siswa");
				}

				break;

			case 'delete-siswa':

				$id = $_GET['id'];
				$del = mysqli_query($conn, "DELETE FROM siswa WHERE id=$id");

				if ($del) {
					header("Location:index.php?page=data-siswa&status=success");
				}else{
					header("Location:index.php?page=data-siswa&status=failed");
				}

				break;

			case 'add-absensi':

				$id = $_POST["id"];
				$hadir = $_POST["hadir"];
				$tgl = $_POST["tgl"];
				$temu = $_POST["temu"];
				$ket = $_POST["ket"];
				$grade = $_POST["grade"];
				$countSis = count($id);

				for ($i=0; $i < $countSis; $i++) { 
	        		$save = mysqli_query($conn, "INSERT INTO absensi VALUES(NULL,'$id[$i]','$grade','$tgl','$temu','$hadir[$i]','$ket[$i]')");
				}

	        	if ($save) {
					header("Location:index.php?page=detail-absensi&grade=$grade&status=success");
				}else{
					header("Location:index.php?page=add-absensi&grade=$grade");
				}

				break;

			case 'update-absensi':


				$id = $_POST["id"];
				$hadir = $_POST["hadir"];
				$tgl = $_POST["tgl"];
				$temu = $_POST["temu"];
				$ket = $_POST["ket"];
				$grade = $_POST["grade"];

				$countSis = count($id);

				$del = mysqli_query($conn, "DELETE FROM absensi WHERE pertemuan=$temu AND kelas='$grade'");

				for ($i=0; $i < $countSis; $i++) { 
	        		$save = mysqli_query($conn, "INSERT INTO absensi VALUES(NULL,'$id[$i]','$grade','$tgl','$temu','$hadir[$i]','$ket[$i]')");
				}

	        	if ($save) {
					header("Location:index.php?page=detail-absensi&grade=$grade&status=success");
				}else{
					header("Location:index.php?page=edit-absensi&temu=$temu&grade=$grade");
				}

				break;

			case 'delete-absensi':

				$temu = $_GET['temu'];
				$grade = $_GET['grade'];

				$del = mysqli_query($conn, "DELETE FROM absensi WHERE pertemuan=$temu AND kelas='$grade'");

				if ($del) {
					header("Location:index.php?page=detail-absensi&grade=$grade&status=success");
				}else{
					header("Location:index.php?page=detail-absensi&grade=$grade&status=failed");
				}

				break;

			case 'logout' :
				session_unset();
				session_destroy();
				header("Location:login.php");
				break;

			default:
				echo "Aksi tidak dapat dilakukan";
				break;

		}
	}
}

?>