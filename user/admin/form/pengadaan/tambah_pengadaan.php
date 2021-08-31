<?php 
  $caption = "Usulkan Pengadaan ";
  $kategori = "Diusulkan";
  $css = "style='display:none'";
  $status_pengadaan = "0";

?>            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $caption ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="form/pengadaan/simpan_pengadaan.php" method="post" enctype="multipart/form-data">

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
                  <label class="col-sm-2 control-label">Nama pengadaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="nama_pengadaan">
                    <input type="hidden" class="form-control" required name="kategori" value="<?php echo $kategori ?>">
                    <input type="hidden" class="form-control" required name="status" value="<?php echo $status_pengadaan ?>">
                    
                  </div>
                </div>   


              

                <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" required name="ket" rows="10"></textarea>
                  </div>
                </div>  
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Pengadaan</label>
                  <div class="col-sm-10">
                    <select class="form-control" required name="jenis">
                    <option value="Beli">Beli</option>                    
                    <option value="Sewa">Sewa</option>
                    </select>                    
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Harga Satuan</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" required name="harga">                    
                  </div>
                </div>  
                   
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Banyak Item</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" required name="qty">                    
                  </div>
                </div>   
                <div class="form-group">
                  <label class="col-sm-2 control-label">File Proposal</label>
                  <div class="col-sm-10">
                    <input type="file" name="file" required >
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
                <a href="?a=pengadaan" class="btn btn-info">Cancel</a>
                <button type="submit" class="btn btn-info">Ajukan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          