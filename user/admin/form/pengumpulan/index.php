<?php 
if (isset($_GET['filter'])) {
  $jenis = $_GET['jenis'];
  echo "string";
  $q1=mysqli_query($conn, "SELECT * from pengumpulan where jenis='$jenis' order by status asc, id_pengumpulan desc")or die(mysqli_error());
}else{
  $q1=mysqli_query($conn, "SELECT * from pengumpulan order by status asc, id_pengumpulan desc")or die(mysqli_error());
}
 ?>


<div class="box-header with-border">
  <h3 class="box-title">Data Pengumpulan</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#filter">Filter Berdasarkan Jenis Sumbangan</a>
    <?php if ($bidang==2) { ?>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addballroom">Tambah Pengumpulan</a>
  <?php } ?>
  </div>
</div>

<form action="form/pengumpulan/simpan_pengumpulan.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addballroom">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Pengumpulan</h4>
              </div>
              <div class="modal-body">
                  
              <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tgl" class="form-control" required value="<?php echo date('Y-m-d') ?>">
              </div> 
              <div class="form-group">
                  <label>Jam</label>
                  <input type="time" name="jam" class="form-control" required value="<?php echo date('h:i') ?>">
              </div> 
              <div class="form-group">
                  <label>Jenis Pengumpulan</label>
                  <select name="jenis" class="form-control">
                    
                  <?php $jenis = ['Infaq / Sedekah','Zakat','Dana Lainnya'];
                  foreach ($jenis as $k => $v) { ?>
                    <option value="<?php echo $v ?>"><?php echo $v ?></option>
                  <?php } ?>
                  </select>
              </div> 

              <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" required>
              </div> 
              <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" required>
              </div> 
              <div class="form-group">
                  <label>Keterangan </label>
                  <textarea name="ket" class="form-control" required rows="7" placeholder=""></textarea>
              </div> 
              <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" name="jumlah" class="form-control" required>
              </div> 
              <div class="form-group">
                  <label>File Pendukung</label>
                  <input type="file" name="file" class="form-control" required>
              </div> 
            
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data Pengumpulan</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


<form action="" method="GET" enctype="multipart/form-data">
<div class="modal fade" id="filter">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Filter Pengumpulan</h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
                  <label>Jenis Pengumpulan</label>
                  <input type="hidden" name="a" value="pengumpulan">
                  <input type="hidden" name="filter" value="jenis">
                  <select name="jenis" class="form-control">
                    
                  <?php $jenis = ['Infaq / Sedekah','Zakat','Dana Lainnya'];
                  foreach ($jenis as $k => $v) { ?>
                    <option value="<?php echo $v ?>"><?php echo $v ?></option>
                  <?php } ?>
                  </select>
              </div> 
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Filter</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>

<hr>
<?php 
  
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        <td>Jenis Sumbangan</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>Keterangan</td>
        <td>Jumlah</td>
        <td>Waktu Menyumbang</td>
        <td>File Pendukung</td>
        <td>Status</td>
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  $status = ['Pengecekan','Disetujui','Ditolak'];
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
  
    
    <td><?php echo $d1['jenis'] ?></td>
    <td><?php echo $d1['nama'] ?></td>
    <td><?php echo $d1['alamat'] ?></td>
    <td><?php echo $d1['keterangan'] ?></td>
    <td><?php echo number_format($d1['jumlah']) ?></td>
    <td><?php echo $d1['tgl_infaq'].'<br>'.$d1['jam_infaq'] ?></td>
    <td><img src="form/pengumpulan/gambar/<?php echo $d1['file'] ?>" width="200px"></td>
    <td><?php echo $status[$d1['status']] ?></td>

    <td>
      <!-- jika level bendahara -->
      <?php if ($d1['status']=='0') { 
        if ($bidang==3) { ?>
      <a href="form/pengumpulan/acc.php?id=<?php echo $d1['id_pengumpulan'] ?>&status=1" class="btn btn-info btn-xs" onclick="return confirm('Apakah anda yakin.?')">Acc</a>
      <a href="form/pengumpulan/acc.php?id=<?php echo $d1['id_pengumpulan'] ?>&status=2" class="btn btn-info btn-xs" onclick="return confirm('Apakah anda yakin.?')">Reject (jika ditolak berikan alasan)</a>
        
      <?php }
      else if ($bidang==2) { ?>
      <!-- jika level pengumpul -->
      <a href="form/pengumpulan/hapus_pengumpulan.php?id=<?php echo $d1['id_pengumpulan'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
      <a href="?a=edit_pengumpulan&id=<?php echo $d1['id_pengumpulan'] ?>" class="btn btn-warning btn-xs">Edit</a>    
      <?php }
      } ?>
    </td>
  </tr>
  <?php } ?>
</table>