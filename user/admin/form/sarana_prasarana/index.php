<div class="box-header with-border">
  <h3 class="box-title">Data Sarana Prasarana</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addballroom">Tambah Sarana Prasarana</a>
  </div>
</div>

<form action="form/sarana_prasarana/simpan_sarana_prasarana.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addballroom">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Sarana Prasarana</h4>
              </div>
              <div class="modal-body">
                  
              <div class="form-group">
                  <label>Nama Sarana Prasarana</label>
                  <input type="text" name="nama" class="form-control" required>
              </div> 
              <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="ket" class="form-control" required></textarea>
              </div> 
              <div class="form-group">
                  <label>Banyak Sarana Prasarana</label>
                  <input type="number" name="banyak" class="form-control" required>
              </div> 
            
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data Sarana Prasarana</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


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
        <td>Keterangan</td>
        <td>Banyak Sarana Prasarana</td>
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
  
    
    <td><?php echo $d1['nama_sapras'] ?></td>
    <td><?php echo $d1['keterangan'] ?></td>
    <td><?php echo $d1['stok'] ?></td>

    <td>
      <a href="form/sarana_prasarana/hapus_sarana_prasarana.php?id=<?php echo $d1['id_sapras'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
      <a href="?a=edit_sarana_prasarana&id=<?php echo $d1['id_sapras'] ?>" class="btn btn-warning btn-xs">Edit</a>    
    </td>
  </tr>
  <?php } ?>
</table>