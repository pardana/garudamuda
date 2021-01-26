<?php
	$nama  = mysqli_real_escape_string($conn,$_POST['nama']);
	$username  = mysqli_real_escape_string($conn,$_POST['username']);
	$password  = password_hash($_POST['password1'], PASSWORD_DEFAULT);
	$level = mysqli_real_escape_string($conn,$_POST['usertype']);


$q = mysqli_query($conn, "INSERT INTO user (nama,username,password,usertype) VALUES ('$nama','$username','$password','$level')") or die (mysqli_error());
	if ($q) {
		echo "<script>alert('Data berhasil di simpan');window.location='?page=administrator'</script>";
	}
?>
