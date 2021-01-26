<?php
	$Nomor = $_GET['Id'];
	$hapus = mysqli_query($conn,"DELETE FROM user WHERE id_user = '$Nomor' ");
	if ($hapus) {
		echo "<script>alert('Data Berhasil Dihapus');window.location = '?page=administrator' </script>";
	}
?>