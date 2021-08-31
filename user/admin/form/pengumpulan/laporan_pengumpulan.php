<?php 

$bulan =  $_GET['bulan'];
$tahun =  $_GET['tahun'];

if (isset($_GET['filter'])) {
  $jenis = $_GET['jenis'];
  $q1=mysqli_query($conn, "SELECT * from pengumpulan where jenis='$jenis' and status='1' and month(tgl_infaq)='$bulan' and year(tgl_infaq)='$tahun'  order by status asc, id_pengumpulan desc")or die(mysqli_error());
}else{
  $jenis = "";
  $q1=mysqli_query($conn, "SELECT * from pengumpulan where status='1'  and month(tgl_infaq)='$bulan' and year(tgl_infaq)='$tahun' order by status asc, id_pengumpulan desc")or die(mysqli_error());
}
 ?>


<div class="box-header with-border">
  <h3 class="box-title">Laporan Data Pengumpulan <br>Bulan <?php echo $namabulan[$bulan].' '.$tahun ?></h3>

  <div class="box-tools pull-right">
    <a href="form/pengumpulan/print_laporan_pengumpulan.php?bulan=<?php echo $bulan ?>&tahun=<?php echo $tahun ?>&jenis=<?php echo $jenis ?>" class="btn btn-default btn-sm"  target="_blank">Print</a>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#filter">Filter Berdasarkan Jenis Sumbangan</a>
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
                  <input type="hidden" name="a" value="laporan_pengumpulan">
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


<form action="" method="GET" enctype="multipart/form-data">
<div class="modal fade" id="filter">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Filter Pengumpulan</h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
                  <label>Jenis Pengumpulan</label>
                  <input type="hidden" name="a" value="laporan_pengumpulan">
                  <input type="hidden" name="filter" value="jenis">
                  <input type="hidden" name="bulan" value="<?php echo $bulan ?>">
                  <input type="hidden" name="tahun" value="<?php echo $tahun ?>">
                  <select name="jenis" class="form-control">
                    
                  <?php $jenis = ['Infaq / Sedekah','Zakat','Dana Lainnya'];
                  foreach ($jenis as $k => $v) { ?>
                    <option value="<?php echo $v ?>"><?php echo $v ?></option>
                  <?php } ?>
                  </select>
              </div> 
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Filter</button>
               
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
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        <td>Jenis Sumbangan</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>Keterangan</td>
        <td>Jumlah</td>
        <td>Waktu Menyumbang</td>
      </tr>
    </thead>
  <?php 
  $status = ['Pengecekan','Disetujui','Ditolak'];
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
  
    
    <td><?php echo $d1['jenis'] ?></td>
    <td><?php echo $d1['nama'] ?></td>
    <td><?php echo $d1['alamat'] ?></td>
    <td><?php echo $d1['keterangan'] ?></td>
    <td><?php echo number_format($d1['jumlah']) ?></td>
    <td><?php echo $d1['tgl_infaq'].'<br>'.$d1['jam_infaq'] ?></td>

    
  </tr>
  <?php } ?>
</table>