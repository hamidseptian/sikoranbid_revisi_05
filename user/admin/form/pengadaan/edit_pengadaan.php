<?php 
$id = $_GET['id'];
  $caption = "Edit Pengadaan ";
  $kategori = "Diusulkan";
  $css = "style='display:none'";
  $status_pengadaan = "0";

  $q1=mysqli_query($conn, "SELECT * from pengadaan p left join bidang b on p.id_bidang = b.id_bidang  where p.id_pengadaan='$id'");
  $d = mysqli_fetch_array($q1);
?>            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $caption ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="form/pengadaan/simpanedit_pengadaan.php" method="post" enctype="multipart/form-data">

              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama pengadaan</label>
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" required name="id" value="<?php echo $d['id_pengadaan'] ?>">
                    <input type="text" class="form-control" required name="nama_pengadaan" value="<?php echo $d['item'] ?>">
                    <input type="hidden" class="form-control" required name="kategori" value="<?php echo $kategori ?>">
                    <input type="hidden" class="form-control" required name="status" value="<?php echo $status_pengadaan ?>">
                    
                  </div>
                </div>   


              

                <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" required name="ket" rows="10"><?php echo str_replace('<br />', '', $d['keterangan']) ?></textarea>
                  </div>
                </div>  
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Pengadaan</label>
                  <div class="col-sm-10">
                    <select class="form-control" required name="jenis">
                    <option value="Beli" <?php if($d['jenis']=='Beli'){echo "selected";} ?>>Beli</option>                    
                    <option value="Sewa" <?php if($d['jenis']=='Sewa'){echo "selected";} ?>>Sewa</option>
                    </select>                    
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Harga Satuan</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" required name="harga" value="<?php echo $d['harga_satuan'] ?>">                    
                  </div>
                </div>  
                   
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Banyak Item</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" required name="qty" value="<?php echo $d['qty'] ?>">                    
                  </div>
                </div>   
                <div class="form-group">
                  <label class="col-sm-2 control-label">File Proposal</label>
                  <div class="col-sm-10">
                    <input type="file" name="file">
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
          