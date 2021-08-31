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


  // if ($bidang ==1 || $bidang ==4) {
  //   $nama_bidang = "Semua Bidang";
  //   $q1=mysqli_query($conn, "SELECT * from proker p left join bidang b on p.id_bidang = b.id_bidang where year(tgl)='$tahun' and month(tgl)='$bulan'  order by p.id_proker desc")or die(mysqli_error());
  //   $css = "";
  // }else{
    $nama_bidang = $level;
    $q1=mysqli_query($conn, "SELECT * from pendistribusian_proker p 
      left join bidang b on p.id_bidang_terlibat = b.id_bidang 
      left join detail_proker dp on p.id_detail_proker = dp.id_detail_proker

      where year(p.tanggal)='$tahun' and month(p.tanggal)='$bulan' 
      and dp.status=3
      ")or die(mysqli_error());
    $css = "style='display:none'";
  // }

 ?>
<div class="box-header with-border">
    <h3 class="box-title">Laporan Pendistribusian<br>Bulan <?php echo $namabulan[$bulan].' '.$tahun ?></h3>

  <div class="box-tools pull-right">
    
    <a href="form/proker/print_pendistribusian.php?bulan=<?php echo $bulan ?>&tahun=<?php echo $tahun ?>" class="btn btn-default btn-sm" target="_blank">Print</a>
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
                  <input type="hidden" name="a" value="laporan_pendistribusian">
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
          <td>Item</td>
          <td>Kebutuhan</td>
          <td>Keterangan Kebutuhan</td>
          <td>Distribusikan Ke</td>
          <td>Disetujui</td>
       
        </tr>
      </thead>
    <?php 
    while ($d1=mysqli_fetch_array($q1)) { 
      $bidang_terlibat = $d1['id_bidang_terlibat'];
      $kebutuhan = [
        1=>'',
        2=>'',
        3=>'Rp. '.$d1['qty'],
        4=>$d1['qty'],
        5=>$d1['qty'],
        6=>$d1['qty'].' Unit',
      ];
     
      $disetujui = [
        1=>'',
        2=>'',
        3=>'Rp. '.$d1['disetujui'],
        4=>$d1['disetujui'],
        5=>$d1['disetujui'],
        6=>$d1['disetujui'].' Unit',
      ];
     
     $show_kebutuhan = $kebutuhan[$bidang_terlibat];
     $show_disetujui = $disetujui[$bidang_terlibat];
      ?>
    <tr>
      <td><?php echo $no++ ?></td>
     
    
      
      <td><?php echo $d1['item'] ?></td>
      <td><?php echo $show_kebutuhan ?></td>
      <td><?php echo $d1['keterangan'] ?></td>
      <td><?php echo $d1['nama_bidang'] ?></td>
      <td><?php echo $show_disetujui ?></td>
    

    </tr>
    <?php } ?>
  </table>
</div>