<?php

$id			= $conn->real_escape_string(trim($_POST['id']));
$tgl        = $conn->real_escape_string(trim($_POST['tgl']));
$uraian     = $conn->real_escape_string(trim($_POST['uraian']));
$debit      = $conn->real_escape_string(trim($_POST['debit']));


$ubah		= mysqli_query($conn,"UPDATE kas SET tgl ='$tgl', uraian = '$uraian', debit = '$debit' WHERE id = '$id' ") or die(mysqli_error($conn));
if ($ubah) {
	echo "<script>alert('Data Berhasil Diubah');window.location='?page=kas-masuk'</script>";
}

?>