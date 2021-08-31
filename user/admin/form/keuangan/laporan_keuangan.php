<?php 

$bulan =  $_GET['bulan'];
$tahun =  $_GET['tahun'];


  $q_pengumpulan=mysqli_query($conn, "SELECT * from pengumpulan where status='1'  and month(tgl_infaq)='$bulan' and year(tgl_infaq)='$tahun' order by tgl_infaq asc")or die(mysqli_error());
  $q_pengeluaran=mysqli_query($conn, "SELECT * from pengeluaran where month(tanggal)='$bulan' and year(tanggal)='$tahun' order by tanggal asc")or die(mysqli_error());

 ?>


<div class="box-header with-border">
  <h3 class="box-title">Laporan Data Keuangan <br>Bulan <?php echo $namabulan[$bulan].' '.$tahun ?></h3>

  <div class="box-tools pull-right">
    <a href="" class="btn btn-default btn-sm"  target="_blank">Print</a>
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
                  <input type="hidden" name="a" value="laporan_keuangan">
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
        <td>Keterangan</td>
        <td>Pemasukan</td>
        <td>Pengeluaran</td>
      </tr>
    </thead>
  <?php 
  $status = ['Pengecekan','Disetujui','Ditolak'];
  while ($d_pengumpulan=mysqli_fetch_array($q_pengumpulan)) { 
    $data_keuangan_masuk = [
      'keterangan'=>$d_pengumpulan['jenis'].'<br>'.$d_pengumpulan['keterangan'],
      'pemasukan'=>$d_pengumpulan['jumlah'],
      'pengeluaran'=>0,
    ];
    array_push($data_keuangan, $data_keuangan_masuk);
     } 
  while ($d_pengeluaran=mysqli_fetch_array($q_pengeluaran)) { 
    $data_keuangan_masuk = [
      'keterangan'=>$d_pengeluaran['keterangan'].'<br>'.$d_pengeluaran['qty'].' Unit',
      'pemasukan'=>0,
      'pengeluaran'=>($d_pengeluaran['biaya'] * $d_pengeluaran['qty']),
    ];
    array_push($data_keuangan, $data_keuangan_masuk);
     } 

ksort($data_keuangan, 3);
$total_pemasukan =0;
$total_pengeluaran =0;
     foreach ($data_keuangan as $k => $v) { 
        $total_pemasukan +=$v['pemasukan'];
        $total_pengeluaran +=$v['pengeluaran'];
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $v['keterangan'] ?></td>
          <td><?php echo number_format($v['pemasukan']) ?></td>
          <td><?php echo number_format($v['pengeluaran']) ?></td>
        </tr>
      <?php } ?>
      <tr>
        <td colspan="2">Total</td>
        <td><?php echo number_format($total_pemasukan) ?></td>
        <td><?php echo number_format($total_pengeluaran) ?></td>
      </tr>
</table>