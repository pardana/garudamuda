<?php
	$Nomor = $_GET['Id'];
	$ubah = mysqli_query($conn,"SELECT * FROM user WHERE id_user = '$Nomor' ");
	$row = mysqli_fetch_array($ubah);
?>
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Admin</h3>
	</div>
	<div class="box-body">
		<form class="form-horizontal" action="?page=proses-edit-admin" method="post">
	      <div class="box-body">
	         <div class="form-group">
	          <label for="Nama" class="col-md-3 control-label "  >Nama</label>

	          <div class="col-md-9">
	            <input type="hidden" class="form-control" id="nomor" name="nomor" required="" value="<?=$row['id_user']?>" >
	            <input type="text" class="form-control" id="nama" name="nama" required="" value="<?=$row[1]?>" disabled>
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="Judul" class="col-md-3 control-label "  >Username</label>

	          <div class="col-md-9">
	            <input type="text" class="form-control" id="username" name="username"  value="<?=$row[2]?>" >
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="Judul" class="col-md-3 control-label "  >Password Baru</label>

	          <div class="col-md-9">
	            <input type="password" class="form-control" id="password1" name="password1" required="">
	          </div>
	        </div>

<!-- 	        <div class="form-group">
	          <label class="col-md-3 control-label">Tipe User</label>
	            <div class="col-md-9">
	            <input type="radio" name="usertype" value="siswa" checked> Admin 
	            </div>
	            
	          </div> -->

	      </div>
      <!-- /.box-body -->
	      <div class="box-footer">
	        <button type="submit" class="btn btn-primary pull-right">Simpan</button>

	        <a href="?page=tabel-user-siswa"><button class="btn btn-danger pull-right" style="margin-right:5px">Batal</button></a>
	      </div>
      <!-- /.box-footer -->
    </form>
	</div>
</div>