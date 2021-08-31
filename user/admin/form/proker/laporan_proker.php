<?php 
$bulan =  $_GET['bulan'];
$tahun =  $_GET['tahun'];

$status_proker = [
  'Diusulkan', // 0
  'ACC Pendayagunaan', // 1
  'Revisi Pendayagunaan', // 2
  'ACC KP Dan Persiapan ', // 3 jika sudah di acc Pendayagunaan
  'Revisi KP', // 4
  'Pendistribusian', // 5 admin ditribusi melakukan pemilihan bidang lain terkait kebutuhan proker. jika sudah di distribusikan apakah bisa di edit lagi itemnya.?
  'Menunggu keputusan bidang terlibat', // 6 perbaikan item dilakukan oleh pengusul jika ada bidang yang menolak pendistribusian. jika selesai status kembali pada 5
  'Perbaikan Item', // 7 perbaikan item dilakukan oleh pengusul jika ada bidang yang menolak pendistribusian. jika selesai status kembali pada 5
  'Pengecekan kembali bidang pengusul', // 8 pada banding ini kegiatan sama dengan persiapan tapi status banding. ketika selesai banding maka kembali pada status 5
  'Banding', // 9 pada banding ini kegiatan sama dengan persiapan tapi status banding. ketika selesai banding maka kembali pada status 5
  'Pelaksanaan Proker', // 10
  'Laporan Dan Evaluasi', // 11
  'Selesai', // 12
  99=>'Di Tolak'];

  $persen = 100 / 12;


  if ($bidang ==1 || $bidang ==4) {
    $nama_bidang = "Semua Bidang";
    $q1=mysqli_query($conn, "SELECT * from proker p left join bidang b on p.id_bidang = b.id_bidang where year(tgl)='$tahun' and month(tgl)='$bulan'  order by p.id_proker desc");
    $css = "";
  }else{
    $nama_bidang = $level;
    $q1=mysqli_query($conn, "SELECT * from proker p left join bidang b on p.id_bidang = b.id_bidang where year(tgl)='$tahun' and month(tgl)='$bulan' p.id_bidang = '$bidang' order by p.id_proker desc");
    $css = "style='display:none'";
  }

 ?>
<div class="box-header with-border">
    <h3 class="box-title">Laporan Data Proker <br>Bulan <?php echo $namabulan[$bulan].' '.$tahun ?></h3>

  <div class="box-tools pull-right">
    
    <a href="form/proker/print_laporan_proker.php?bulan=<?php echo $bulan ?>&tahun=<?php echo $tahun ?>" class="btn btn-info btn-sm" target="_blank">Print</a>
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
                  <input type="hidden" name="a" value="laporan_proker">
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
 ?>
<div class="box-body" style="overflow-x:scroll;">
   <table class="table table-striped table-bordered" id="example1">
      <thead>
        <tr>
          <td>No</td>
          <td <?php echo $css ?>>Bidang</td>
          <td>Nama Proker</td>
          <td>Keterangan</td>
          <td>Status</td>
          <td>Laporan</td>
          <td>Evaluasi</td>
        </tr>
      </thead>
    <?php 
    while ($d1=mysqli_fetch_array($q1)) { 
      $id_proker = $d1['id_proker'];
      $q_laporan = mysqli_query($conn, "SELECT * from laporan_proker where id_proker='$id_proker'");
      $d_laporan = mysqli_fetch_array($q_laporan);
      ?>
    <tr>
      <td><?php echo $no++ ?></td>
     
    
      
      <td <?php echo $css ?>><?php echo $d1['nama_bidang'] ?></td>
      <td><?php echo $d1['nama_proker'] ?></td>
      <td><?php echo $d1['keterangan'] ?></td>
      <td><?php echo round($d1['status'] * $persen, 2) ?> % <br>  <?php echo $status_proker[$d1['status']] ?></td>


      <td><?php echo $d_laporan['laporan']; ?></td>
      <td><?php echo $d_laporan['evaluasi']; ?></td>
    </tr>
    <?php } ?>
  </table>
</div>