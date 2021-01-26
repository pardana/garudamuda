<section class="content">
 <div class="row">
    <div class="col-xs-12">

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Laporan Kas Pengeluaran</h3>
        </div>
          <div class="box-body">
<form method="POST" action="cetak-kas-keluar.php" target="_blank" >      
 
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