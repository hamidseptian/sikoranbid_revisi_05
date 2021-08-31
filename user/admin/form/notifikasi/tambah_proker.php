<?php 
if ($bidang ==1) {
  $caption = "Tambah Proker";
  $kategori = "Ditentukan";
  $css = "";
  $status_proker = "2";
}else{
  $caption = "Usulkan Proker ".$level;
  $kategori = "Diusulkan";
  $css = "style='display:none'";
  $status_proker = "0";
}
?>            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $caption ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="form/proker/simpan_proker.php" method="post" enctype="multipart/form-data">

              <div class="box-body">
                <div class="form-group"  <?php echo $css ?>>
                  <label class="col-sm-2 control-label">Bidang Penugasan</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="bidang">
                      <?php $q_bidang = mysqli_query($conn, "SELECT * from bidang where id_bidang not in (1)");
                      while ($d_bidang = mysqli_fetch_array($q_bidang)) {
                        if ($bidang!=1) {
                          if ($bidang==$d_bidang['id_bidang']) {
                            $selected = "selected";
                          }else{
                            $selected = "";
                          }
                        }else{
                            $selected = "";
                        }

                       ?>
                        <option value="<?php echo $d_bidang['id_bidang'] ?>" <?php echo $selected ?>><?php echo $d_bidang['nama_bidang'] ?></option>
                         
                       <?php } ?>
                    </select>
                  </div>
                </div>   

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Proker</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="nama_proker">
                    <input type="hidden" class="form-control" required name="kategori" value="<?php echo $kategori ?>">
                    <input type="hidden" class="form-control" required name="status" value="<?php echo $status_proker ?>">
                    
                  </div>
                </div>   


              

                <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" required name="ket"></textarea>
                  </div>
                </div>   

               <!--  <div class="form-group">
                  <label class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" required name="file">
                  </div>
                </div> -->   

			

             

             



              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="?a=proker" class="btn btn-info">Cancel</a>
                <button type="submit" class="btn btn-info">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          