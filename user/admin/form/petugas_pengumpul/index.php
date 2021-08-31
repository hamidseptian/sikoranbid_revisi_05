<div class="box-header with-border">
  <h3 class="box-title">Data Petugas Pengumpul</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addballroom">Tambah Petugas Pengumpul</a>
  </div>
</div>

<form action="form/petugas_pengumpul/simpan_petugas_pengumpul.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addballroom">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Petugas Pengumpul</h4>
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
              <div class="form-group">
                  <label>Jenis Sumbangan</label>
                  <select name="jenis" class="form-control">
                    <?php 
                    $jenis = ['Infaq / Sedekah','Zakat','Dana Lainnya'];
                    foreach ($jenis as $key => $value) { ?>
                      <option value="<?php echo $value ?>"><?php echo $value ?></option>
                    <?php } ?>
                  </select>
              </div> 
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data Petugas Pengumpul</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from petugas_pengumpul
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
        <td>Jenis Sumbangan</td>
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
    <td><?php echo $d1['jenis'] ?></td>

    <td>
      <a href="form/petugas_pengumpul/hapus_petugas_pengumpul.php?id=<?php echo $d1['id_petugas_pengumpul'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
      <a href="?a=edit_petugas_pengumpul&id=<?php echo $d1['id_petugas_pengumpul'] ?>" class="btn btn-warning btn-xs">Edit</a>    
    </td>
  </tr>
  <?php } ?>
</table>