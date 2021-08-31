<div class="box-header with-border">
  <h3 class="box-title">Data Kotak Infaq</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addballroom">Tambah Kotak Infaq</a>
  </div>
</div>

<form action="form/kotak_infaq/simpan_kotak_infaq.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addballroom">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Kotak Infaq</h4>
              </div>
              <div class="modal-body">
                  
              <div class="form-group">
                  <label>Lokasi Kotak Infaq</label>
                  <input type="text" name="lokasi" class="form-control" required>
              </div> 
              <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat" class="form-control" required></textarea>
              </div> 
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data Kotak Infaq</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from kotak_infaq
    ");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        <td>Lokasi</td>
        <td>Alamat</td>
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
  
    
    <td><?php echo $d1['lokasi'] ?></td>
    <td><?php echo $d1['alamat'] ?></td>

    <td>
      <a href="form/kotak_infaq/hapus_kotak_infaq.php?id=<?php echo $d1['id_kotak'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
      <a href="?a=edit_kotak_infaq&id=<?php echo $d1['id_kotak'] ?>" class="btn btn-warning btn-xs">Edit</a>    
    </td>
  </tr>
  <?php } ?>
</table>