<?php 


$status_pengadaan = [
  'Diusulkan', // 0 baru diusulkan bidang
  'Di Tolak KP', // 1 setelah di lihat KP 
  'Menunggu Pencairan',// 2 jika di ACC kp
  'Pencairan Ditolak', // 3
  'Pencairan Disetujui', // 4
];


  if ($bidang ==1 || $bidang ==3) {
    $nama_bidang = "Semua Bidang";
    if ($bidang==1) {
      $q1=mysqli_query($conn, "SELECT * from pengadaan p left join bidang b on p.id_bidang = b.id_bidang  order by p.id_pengadaan desc");
    }else{
      $q1=mysqli_query($conn, "SELECT * from pengadaan p left join bidang b on p.id_bidang = b.id_bidang where status >=2 order by p.id_pengadaan desc");
    }
    $css = "";
  }else{
    $nama_bidang = $level;
    $q1=mysqli_query($conn, "SELECT * from pengadaan p left join bidang b on p.id_bidang = b.id_bidang where p.id_bidang = '$bidang' order by p.id_pengadaan desc");
    $css = "style='display:none'";
  }

 ?>
<div class="box-header with-border">
  <h3 class="box-title">Data Pengadaan <small><?php echo $nama_bidang ?></small></h3>

  <div class="box-tools pull-right">
    <?php if ($bidang !=3 && $bidang !=1) { ?>
    <a href="?a=tambah_pengadaan" class="btn btn-info btn-sm">Tambah pengadaan</a>
    <?php } ?>
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
          <td>Bidang</td>
          <td>Nama pengadaan</td>
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
     
    
      
      <td><?php echo $d1['nama_bidang'] ?></td>
      <td><?php echo $d1['item'] ?></td>
      <td><?php echo $d1['keterangan'] ?></td>
      <td><?php echo $status_pengadaan[$d1['status']] ?></td>


      <td>
        <a href="?a=detail_pengadaan&id=<?php echo $d1['id_pengadaan'] ?>&menu=pengadaan&bidang_pengusul=<?php echo $d1['id_bidang'] ?>" class="btn btn-info btn-xs">Detail</a>    
      </td>
    </tr>
    <?php } ?>
  </table>
</div>