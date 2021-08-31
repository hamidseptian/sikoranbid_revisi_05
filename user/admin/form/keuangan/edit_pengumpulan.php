<div class="box-header with-border">
  <h3 class="box-title">Edit Data pengumpulan</h3>

  <div class="box-tools pull-right">
    <a href="?a=pengumpulan" class="btn btn-info" >Kembali</a>
  </div>
</div>


<?php 
$id=$_GET['id'];
  $q1=mysqli_query($conn, "SELECT * from pengumpulan where id_pengumpulan='$id'") or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $j1=mysqli_num_rows($q1);
 ?>

<br>

<form action="form/pengumpulan/simpanedit_pengumpulan.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" class="form-control" value="<?php echo $d1['id_pengumpulan'] ?>">
                
              
              <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tgl" class="form-control" required value="<?php echo $d1['tgl_infaq'] ?>">
              </div> 
              <div class="form-group">
                  <label>Jam</label>
                  <input type="time" name="jam" class="form-control" required value="<?php echo $d1['jam_infaq'] ?>">
              </div> 
              <div class="form-group">
                  <label>Jenis Pengumpulan</label>
                  <select name="jenis" class="form-control">
                    
                  <?php $jenis = ['Infaq / Sedekah','Zakat','Dana Lainnya'];
                  foreach ($jenis as $k => $v) { ?>
                    <option value="<?php echo $v ?>" <?php if($v==$d1['jenis']){echo "selected";} ?>><?php echo $v ?></option>
                  <?php } ?>
                  </select>
              </div> 
              <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" name="ket" class="form-control" required value="<?php echo $d1['keterangan'] ?>">
              </div> 
              <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" name="jumlah" class="form-control" required value="<?php echo $d1['jumlah'] ?>">
              </div> 
              <div class="form-group">
                  <label>File Pendukung</label>
                  <input type="file" name="file" class="form-control" value="<?php echo $d1['jumlah'] ?>">
              </div> 
              


              <div class="form-group">
                 <input type="submit" class="btn btn-info"  value="Simpan Perubahan Data">
              </div> 

              
          
</form>