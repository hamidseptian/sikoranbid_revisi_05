<div class="box-header with-border">
  <h3 class="box-title">Data Muzaki</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <a href="?a=donasi_muzaki&bulan=<?php echo date('n') ?>&tahun=<?php echo date('Y') ?>" class="btn btn-info btn-sm">Terima Donasi Muzaki </a>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addballroom">Tambah Muzaki</a>
  </div>
</div>

<form action="form/muzaki/simpan_muzaki.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addballroom">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Muzaki</h4>
              </div>
              <div class="modal-body">
                  
              <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" required>
              </div> 
              <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" required>
              </div> 
              <div class="form-group">
                  <label>No HP</label>
                  <input type="text" name="nohp" class="form-control" required>
              </div> 
              
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data Muzaki</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from muzaki
    ");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>No HP</td>
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
  
    
    <td><?php echo $d1['nama'] ?></td>
    <td><?php echo $d1['alamat'] ?></td>
    <td><?php echo $d1['nohp'] ?></td>

    <td>
      <a href="form/muzaki/hapus_muzaki.php?id=<?php echo $d1['id_muzaki'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
      <a href="?a=edit_muzaki&id=<?php echo $d1['id_muzaki'] ?>" class="btn btn-warning btn-xs">Edit</a>    
    </td>
  </tr>
  <?php } ?>
</table>