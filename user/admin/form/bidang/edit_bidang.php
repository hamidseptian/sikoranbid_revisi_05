<div class="box-header with-border">
  <h3 class="box-title">Edit Data bidang</h3>

  <div class="box-tools pull-right">
    <a href="?a=bidang" class="btn btn-info" >Kembali</a>
  </div>
</div>


<?php 
$id=$_GET['id'];
  $q1=mysqli_query($conn, "SELECT * from bidang where id_bidang='$id'") or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $j1=mysqli_num_rows($q1);
 ?>

<br>

<form action="form/bidang/simpanedit_bidang.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" class="form-control" value="<?php echo $d1['id_bidang'] ?>">
                
              <div class="form-group">
                  <label>Nama bidang</label>
                  <input type="text" name="nama" class="form-control" required value="<?php echo $d1['nama_bidang'] ?>">
              </div> 
              


              <div class="form-group">
                 <input type="submit" class="btn btn-info"  value="Simpan Perubahan Data">
              </div> 

              
          
</form>