<?php 

$bulan =  $_GET['bulan'];
$tahun =  $_GET['tahun'];


  $q_pengeluaran=mysqli_query($conn, "SELECT png.*, b.nama_bidang, p.nama_proker, dp.item, dp.qty as qty_diusulkan
    from pengeluaran png 
    left join detail_proker dp on png.id_detail_proker = dp.id_detail_proker
    left join proker p on dp.id_proker=p.id_proker
    left join bidang b on p.id_bidang = b.id_bidang
    where  month(png.tanggal)='$bulan' and year(png.tanggal)='$tahun' order by tanggal asc")or die(mysqli_error());

 ?>


<div class="box-header with-border">
  <h3 class="box-title">Laporan Data Keuangan <br>Bulan <?php echo $namabulan[$bulan].' '.$tahun ?></h3>

  <div class="box-tools pull-right">
    <a href="form/keuangan/print_laporan_pengeluaran.php?bulan=<?php echo $bulan ?>&tahun=<?php echo $tahun ?>" class="btn btn-default btn-sm"  target="_blank">Print</a>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#cari_bulanan">Cari Laporan Bulanan</a>
  </div>
</div>

<form action="" method="GET" enctype="multipart/form-data">
<div class="modal fade" id="cari_bulanan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cari Laporan Bulanann</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" name="a" value="laporan_pengeluaran">
              <div class="form-group">
                  <label>Bulan</label>
                  <select name="bulan" class="form-control">
                    
                  <?php 
                  foreach ($namabulan as $k => $v) { ?>
                    <option value="<?php echo $k ?>"><?php echo $v ?></option>
                  <?php } ?>
                  </select>
              </div> 
              <div class="form-group">
                  <label>Tahun</label>
                  <select name="tahun" class="form-control">
                    
                  <?php
                  for ($i=date('Y'); $i > 2010 ; $i--) { ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php } ?>
                  </select>
              </div> 
            
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Cari</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>



<hr>
<?php 
  
  $no=1;
  $data_keuangan = [];
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        <td>Tanggal</td>
        <td>Bidang</td>
        <td>Proker</td>
        <td>Keterangan</td>
        
        <td>Biaya Di setujui</td>
      </tr>
    </thead>
  <?php 
  $status = ['Pengecekan','Disetujui','Ditolak'];
  $total_semua =0;
  while ($d_pengeluaran=mysqli_fetch_array($q_pengeluaran)) { 
    if ($d_pengeluaran['id_detail_proker']!='') {
      $keterangan = $d_pengeluaran['keterangan'].' Sebanyak '.$d_pengeluaran['qty_diusulkan'];
      $biaya = $d_pengeluaran['biaya'];
    }else{
      $keterangan = $d_pengeluaran['keterangan'].' Sebanyak '.$d_pengeluaran['qty'];
      $biaya = $d_pengeluaran['qty'] * $d_pengeluaran['biaya'];

    }
    $total = $biaya;
    $total_semua +=$total;
?>
    <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $d_pengeluaran['tanggal'] ?></td>
          <td><?php echo $d_pengeluaran['nama_bidang'] ?></td>
          <td><?php echo $d_pengeluaran['nama_proker'] ?></td>
          <td><?php echo $keterangan ?></td>
          <td><?php echo number_format($biaya) ?></td>
        </tr>
      <?php } ?>
        
      <tr>
        <td colspan="5">Total</td>
        <td><?php echo number_format($total_semua) ?></td>
      </tr>
</table>