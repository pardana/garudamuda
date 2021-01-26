<div class="col-md-12">
       <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Administrator</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="?page=proses-add-admin" method="post">
      <div class="box-body">
         <div class="form-group">
          <label for="Nama" class="col-md-3 control-label "  >Nama</label>

          <div class="col-md-9">
            <input type="text" class="form-control" id="nama" name="nama" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="Judul" class="col-md-3 control-label "  >Username</label>

          <div class="col-md-9">
            <input type="text" class="form-control" id="username" name="username" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="Judul" class="col-md-3 control-label "  >Password</label>

          <div class="col-md-9">
            <input type="password" class="form-control" id="password1" name="password1" required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-3 control-label">Tipe User</label>
            <div class="col-md-9">
              <div class="radio">
                  <label for=""><input type="radio" name="usertype" value="admin" checked="">Admin</label> 
                  <label for=""><input type="radio" name="usertype" value="user" >User</label> 
              </div>
            </div>
            
          </div>

      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Simpan</button>

        <button type="reset" class="btn btn-danger pull-right" style="margin-right:5px">Batal</button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</div>
