<div class="box-header with-border">
  <h3 class="box-title">Data Sarana Prasarana</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addballroom">Tambah Sarana Prasarana</a>
  </div>
</div>


<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from sarana_prasarana
    ");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        <td>Nama Sarana Prasarana</td>
        <td>Banyak Sarana Prasarana</td>
        <td>Dipinjamkan </td>
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    $id_sapras =$d1['id_sapras'] ;
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
  
    
    <td><?php echo $d1['nama_sapras'] ?></td>
    <td><?php echo $d1['stok'] ?></td>
    <td>
      <?php 
      $q_peminjaman = mysqli_query($conn, "SELECT sum(dipinjamkan) as dipinjamkan from peminjaman where id_sapras='$id_sapras' and status='0'")or die(mysqli_error());
      $d_peminjaman = mysqli_fetch_array($q_peminjaman);
      echo $d_peminjaman['dipinjamkan']==''?0 : $d_peminjaman['dipinjamkan'];
       ?>
        
    </td>

    <td>
      
      <a href="?a=detail_peminjaman&id=<?php echo $d1['id_sapras'] ?>" class="btn btn-info btn-xs">Detail Peminjaman</a>    
    </td>
  </tr>
  <?php } ?>
</table>