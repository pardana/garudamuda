<section class="content">
    <a href="?page=form-add-admin" class="btn btn-block btn-primary" style="width:80px;margin-bottom:5px">Tambah</a>
  <div class="row">
    <div class="col-xs-12">

      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Daftar Admin</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                 <th width="3%" bgcolor=#71DCFF><center>No</center></th>
                 <th width="17%" bgcolor=#71DCFF><center>Nama</center></th>
                 <th width="20%" bgcolor=#71DCFF><center>Username</center></th>
                 <th width="40%" bgcolor=#71DCFF><center>Password</center></th>
                 <th width="10%" bgcolor=#71DCFF><center>Level</center></th>
                 <th width="5%" bgcolor=#71DCFF><center>Aksi</center></th>
              </tr>
              </thead>
              <tbody>
                <?php
              // Cek apakah terdapat data pada page URL
                  $no = 0;
                  $modal=mysqli_query($conn,"SELECT * FROM user");
                  while($row=mysqli_fetch_array($modal)){
                  $no++;
              ?>
              <tr >
                  <td><center><?=$no?></center></td>
                  <td><?=$row[1]?></td>
                  <td><?=$row[2]?></td>
                  <td><?=$row[3]?></td>
                  <td><?=$row[4]?></td>
                  <td align="center">
                   <a href="?page=form-edit-admin&Id=<?=$row['id_user']?>" class="btn btn-warning btn-xs" title="Ubah"><i class="fa fa-edit"></i></a>
                    <a href="?page=proses-hapus-admin&Id=<?=$row['id_user']?>" class="btn btn-danger btn-xs" title="Hapus" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
              <?php
              // $no++;
            }
               ?>

              </tbody>
            </table>

              <script>
                $(function () {
                  $('#example1').DataTable()
                })
              </script>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
