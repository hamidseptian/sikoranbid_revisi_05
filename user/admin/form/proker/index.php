<?php 


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
if (isset($_GET['jenis'])) {
  if ($_GET['jenis']=="Diusulkan") {
    $q1=mysqli_query($conn, "SELECT * from proker p left join bidang b on p.id_bidang = b.id_bidang where p.kategori='Diusulkan' order by p.id_proker desc");
    $nama_bidang = "Yang Diusulkan Semua Bidang";
  }else{
    $q1=mysqli_query($conn, "SELECT * from proker p left join bidang b on p.id_bidang = b.id_bidang where p.kategori='Ditentukan' order by p.id_proker desc");
    $nama_bidang = "Yang Ditugaskan ke  Semua Bidang";
  }
    $css = "";
}else{

  if ($bidang ==1) {
    $nama_bidang = "Semua Bidang";
    $q1=mysqli_query($conn, "SELECT * from proker p left join bidang b on p.id_bidang = b.id_bidang  order by p.id_proker desc");
    $css = "";
  }else{
    $nama_bidang = $level;
    $q1=mysqli_query($conn, "SELECT * from proker p left join bidang b on p.id_bidang = b.id_bidang where p.id_bidang = '$bidang' order by p.id_proker desc");
    $css = "style='display:none'";
  }
}
 ?>
<div class="box-header with-border">
  <h3 class="box-title">Data Proker <small><?php echo $nama_bidang ?></small></h3>

  <div class="box-tools pull-right">
    <a href="?a=tambah_proker" class="btn btn-info btn-sm">Tambah Proker</a>
  </div>
</div>

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
          <td>Option</td>
        </tr>
      </thead>
    <?php 
    while ($d1=mysqli_fetch_array($q1)) { 
      ?>
    <tr>
      <td><?php echo $no++ ?></td>
     
    
      
      <td <?php echo $css ?>><?php echo $d1['nama_bidang'] ?></td>
      <td><?php echo $d1['nama_proker'] ?></td>
      <td><?php echo $d1['keterangan'] ?></td>
      <td><?php echo round($d1['status'] * $persen, 2) ?> % <br>  <?php echo $status_proker[$d1['status']] ?></td>


      <td>
        <a href="?a=detail_proker&id=<?php echo $d1['id_proker'] ?>&menu=proker&bidang_pengusul=<?php echo $d1['id_bidang'] ?>" class="btn btn-info btn-xs">Detail</a>    
      </td>
    </tr>
    <?php } ?>
  </table>
</div>