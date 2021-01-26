<?php
	$Nomor = $_POST['nomor'];
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$password = password_hash($_POST['password1'], PASSWORD_DEFAULT);

	$hapus = mysqli_query($conn,"UPDATE user SET username = '$username', password = '$password' WHERE id_user = '$Nomor' ");
	if ($hapus) {
		echo "<script>alert('Data Berhasil Diubah');window.location='?page=administrator'</script>";
	}
?>