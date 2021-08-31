<div class="box-header with-border">
  <h3 class="box-title">Edit Data Muzaki</h3>

  <div class="box-tools pull-right">
    <a href="?a=muzaki" class="btn btn-info" >Kembali</a>
  </div>
</div>


<?php 
$id=$_GET['id'];
  $q1=mysqli_query($conn, "SELECT * from muzaki where id_muzaki='$id'") or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $j1=mysqli_num_rows($q1);
 ?>

<br>

<form action="form/muzaki/simpanedit_muzaki.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" class="form-control" value="<?php echo $d1['id_muzaki'] ?>">
                
              <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" required value="<?php echo $d1['nama'] ?>">
              </div> 
              <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" required value="<?php echo $d1['alamat'] ?>">
              </div> 
              <div class="form-group">
                  <label>No HP</label>
                  <input type="text" name="nohp" class="form-control" required value="<?php echo $d1['nohp'] ?>">
              </div> 
           
              


              <div class="form-group">
                 <input type="submit" class="btn btn-info"  value="Simpan Perubahan Data">
              </div> 

              
          
</form>