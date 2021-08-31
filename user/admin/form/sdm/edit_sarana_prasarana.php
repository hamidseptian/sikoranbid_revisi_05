<div class="box-header with-border">
  <h3 class="box-title">Edit Data Sarana Prasarana</h3>

  <div class="box-tools pull-right">
    <a href="?a=sarana_prasarana" class="btn btn-info" >Kembali</a>
  </div>
</div>


<?php 
$id=$_GET['id'];
  $q1=mysqli_query($conn, "SELECT * from sarana_prasarana where id_sapras='$id'") or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $j1=mysqli_num_rows($q1);
 ?>

<br>

<form action="form/sarana_prasarana/simpanedit_sarana_prasarana.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" class="form-control" value="<?php echo $d1['id_sapras'] ?>">
                
              <div class="form-group">
                  <label>Nama Sarana Prasarana</label>
                  <input type="text" name="nama" class="form-control" required value="<?php echo $d1['nama_sapras'] ?>">
              </div> 
               <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="ket" class="form-control" required><?php echo str_replace('<br />', '', $d1['keterangan']) ?></textarea>
              </div> 
              <div class="form-group">
                  <label>Banyak Sarana Prasarana</label>
                  <input type="number" name="banyak" class="form-control" required value="<?php echo  $d1['stok'] ?>">
              </div> 
              


              <div class="form-group">
                 <input type="submit" class="btn btn-info"  value="Simpan Perubahan Data">
              </div> 

              
          
</form>