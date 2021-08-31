<?php 
$id=$_GET['id'];
  $q1=mysqli_query($conn, "SELECT * from sarana_prasarana where id_sapras='$id'") or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $j1=mysqli_num_rows($q1);
 ?>
<div class="box-header with-border">
  <h3 class="box-title">Detail Peminjaman Sarana Prasarana <br> <?php echo  $d1['nama_sapras'] ?></h3>

  <div class="box-tools pull-right">
    <a href="?a=peminjaman" class="btn btn-info" >Kembali</a>
  </div>
</div>



<br>

<table class="table" id="example1">
  <thead>
    <tr>
      <td>No</td>
      <td>Proker</td>
      <td>Banyak Dipinjam</td>
      <td>Tanggal Peminjaman</td>
      <td>Tanggal Dikambalikan</td>
      <td>Status</td>
      <td>Option</td>
    </tr>
  </thead>
  <tbody> 
    <?php
    $status_peminjaman  = ['Sedang dipakai','Sudah dikembalikan'];
    $q2 = mysqli_query($conn, "SELECT pj.*, p.nama_proker from peminjaman pj
      left join detail_proker dp on pj.id_detail_proker=dp.id_detail_proker 
      left join proker p on dp.id_proker=p.id_proker
      order by pj.status, pj.id_peminjaman

      ")or die(mysqli_error());
    $no=1;
      while ($d2=mysqli_fetch_array($q2)) { ?>
        <tr>
          <td><?php echo  $no++ ?></td>
          <td><?php echo  $d2['nama_proker'] ?></td>
          <td><?php echo  $d2['dipinjamkan'] ?></td>
          <td><?php echo  $d2['tgl_peminjaman'] ?></td>
          <td><?php echo  $d2['tgl_dikembalikan'] ?></td>
          <td><?php echo  $status_peminjaman[$d2['status']] ?></td>
          <td>
            <?php   if ($d2['status']==0) { ?>
            <a href="form/peminjaman/selesai_peminjaman.php?id=<?php echo $d2['id_peminjaman'] ?>&id_sapras=<?php echo $d2['id_sapras'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah peminjaman <?php echo  $d1['nama_sapras'] ?> pada proker <?php echo  $d2['nama_proker'] ?> sudah selesai.?')">Selesai Peminjaman</a>
            <?php } ?>
          </td>
        </tr>
      <?php   } ?>
  </tbody>
</table>