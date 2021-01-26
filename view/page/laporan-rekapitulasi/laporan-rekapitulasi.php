<?php
include_once("tglindo.php");
?>
<section class="content">
 <div class="row">
    <div class="col-xs-12">

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Laporan Rekapitulasi Kas</h3>
        </div>
          <div class="box-body">
<form method="POST" action="cetak-rekapitulasi.php" target="_blank" >      
 
	<div class="form-group">
 	<label class="col-sm-2 control-label">Tanggal Awal</label>
	<div class="col-sm-3">
		<div class="col-sm-2">
		<input type="date" id="datepicker" name="from">
	</div>
	</div>
	</div>

	<div class="form-group">
 	<label class="col-sm-2 control-label">Tanggal Akhir</label>
	<div class="col-sm-3">
		<div class="col-sm-2">
		<input type="date" id="datepicker" name="end">
	</div>
	</div>
	</div>
	<button class="btn btn-info" type="submit" name="submit" value="proses" onclick="return valid();">Cetak PDF
    </button>
<br><br><br>
</form>
 
  <div class="box box-info">
        <div class="box-header with-border">
         
        </div>
        <form action="">
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="3%" bgcolor=#71DCFF><center>No</center></th>
                  <th width="15%" bgcolor=#71DCFF><center>Tanggal</center></th>
                  <th width="35%" bgcolor=#71DCFF><center>Uraian</center></th>
                  <th width="15%" bgcolor=#71DCFF><center>Debit</center></th>
                  <th width="15%" bgcolor=#71DCFF><center>Kredit</center></th>
                  <th width="15%" bgcolor=#71DCFF><center>Saldo</center></th>

                </tr>
                </thead>
                <tbody>
                     <?php
                    $no = 0;
                    $saldo = 0;
                    $modal = mysqli_query($conn,"SELECT * FROM kas order by tgl asc");
                    while($row = mysqli_fetch_array($modal)){
                    $saldo = $saldo + ($row['debit'] - $row['kredit']);

                    $no++;
                    ?>
                  <tr>
                    <td><center><?=$no?></center></td>
                    <td><center><?php echo TanggalIndo($row['tgl']);?></center></td>
                    <td><?=$row["uraian"]?></td>
                    <?php
                    if ($row['debit'] == 0) {echo "<td></td>";}
                    else {
                          echo "<td>Rp. <z class=\"pull-right\">".number_format(($row['debit']) , 0, ',', '.') . ",00"."</z></td>";
                          }
                        ?> 
                   
                    	<?php
                    if ($row['kredit'] == 0) {echo "<td></td>";}
                    else {
                          echo "<td>Rp. <z class=\"pull-right\">".number_format(($row['kredit']) , 0, ',', '.') . ",00"."</z></td>";
                          }
                        ?> 
                    <td>Rp. <z class="pull-right"><?php echo number_format(@$saldo); ?>,00</z></td>
                    
                    
                    
                  </tr>
                  <?php } ?> 

                  <tr>
                    <td></td>
                    <td colspan="2"><center><strong>JUMLAH</strong></center></td>
                    <?php
                      $totmasuk = mysqli_query($conn,"SELECT SUM(debit) AS total, SUM(kredit) as total2,tgl FROM kas ");
                      $r = mysqli_fetch_array($totmasuk);
                    ?>
                    <td><b>Rp. <z class="pull-right"><?=number_format(($r['total']) , 0, ',', '.') . ",00"?></z></b></td>
                  	 <td><b>Rp. <z class="pull-right"><?=number_format(($r['total2']) , 0, ',', '.') . ",00"?></z></b></td>
                  	 <td><b>Rp. <z class="pull-right"><?=number_format(($r['total'] - $r['total2']) , 0, ',', '.') . ",00"?></z></b></td>
                  </tr>

                </tbody>
              </table>

                
            </div>
            <div class="box-footer">
             <!--  <a href="?page=print-tabel-guru" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a> -->
            </div>
          </div>
        </form>

        <!-- /.box-body -->
      </div>


</form>





</div>

<script type="text/javascript">
  $(function(){
     $('#from').datepicker({
      autoclose: true
    })
     $('#end').datepicker({
      autoclose: true
    })
  })
</script>
<script>

</script>