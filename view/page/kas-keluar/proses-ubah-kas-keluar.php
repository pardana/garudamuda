<?php

$id			= $conn->real_escape_string(trim($_POST['id']));
$tgl        = $conn->real_escape_string(trim($_POST['tgl']));
$uraian     = $conn->real_escape_string(trim($_POST['uraian']));
$kredit     = $conn->real_escape_string(trim($_POST['kredit']));


$ubah		= mysqli_query($conn,"UPDATE kas SET tgl ='$tgl', uraian = '$uraian', kredit = '$kredit' WHERE id = '$id' ") or die(mysqli_error($conn));
if ($ubah) {
	echo "<script>alert('Data Berhasil Diubah');window.location='?page=kas-keluar'</script>";
}

?>