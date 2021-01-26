<?php
	$tanggal  = mysqli_real_escape_string($conn,$_POST['tgl']);
	$uraian  = mysqli_real_escape_string($conn,$_POST['uraian']);
	$debit  = mysqli_real_escape_string($conn,$_POST['debit']);


$q = mysqli_query($conn, "INSERT INTO kas (tgl,uraian,debit,kredit,jenis) VALUES ('$tanggal','$uraian','$debit','0','pemasukan')") or die (mysqli_error());
	if ($q) {
		echo "<script>alert('Data berhasil di simpan');window.location='?page=kas-masuk'</script>";
	}
?>
