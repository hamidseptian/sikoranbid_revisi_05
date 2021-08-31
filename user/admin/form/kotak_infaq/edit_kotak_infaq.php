<div class="box-header with-border">
  <h3 class="box-title">Edit Data Kotak Infaq</h3>

  <div class="box-tools pull-right">
    <a href="?a=kotak_infaq" class="btn btn-info" >Kembali</a>
  </div>
</div>


<?php 
$id=$_GET['id'];
  $q1=mysqli_query($conn, "SELECT * from kotak_infaq where id_kotak='$id'") or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $j1=mysqli_num_rows($q1);
 ?>

<br>

<form action="form/kotak_infaq/simpanedit_kotak_infaq.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" class="form-control" value="<?php echo $d1['id_kotak'] ?>">
                
              <div class="form-group">
                  <label>Nama Kotak Infaq</label>
                  <input type="text" name="lokasi" class="form-control" required value="<?php echo $d1['lokasi'] ?>">
              </div> 
               <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="alamat" class="form-control" required><?php echo str_replace('<br />', '', $d1['alamat']) ?></textarea>
              </div> 
              


              <div class="form-group">
                 <input type="submit" class="btn btn-info"  value="Simpan Perubahan Data">
              </div> 

              
          
</form>