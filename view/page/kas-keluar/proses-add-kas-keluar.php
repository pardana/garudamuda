<?php
	$tanggal  = mysqli_real_escape_string($conn,$_POST['tgl']);
	$uraian  = mysqli_real_escape_string($conn,$_POST['uraian']);
	$kredit  = mysqli_real_escape_string($conn,$_POST['kredit']);


$q = mysqli_query($conn, "INSERT INTO kas (tgl,uraian,debit,kredit,jenis) VALUES ('$tanggal','$uraian','0','$kredit','pengeluaran')") or die (mysqli_error());
	if ($q) {
		echo "<script>alert('Data berhasil di simpan');window.location='?page=kas-keluar'</script>";
	}
?>
