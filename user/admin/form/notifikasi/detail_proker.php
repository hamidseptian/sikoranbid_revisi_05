<?php 
  $id_proker = $_GET['id'];
  $menu = $_GET['menu'];

$q_proker = mysqli_query($conn, "SELECT * from proker p left join bidang b on p.id_bidang=b.id_bidang where id_proker='$id_proker'");
$d_proker = mysqli_fetch_array($q_proker);
$id_bidang = $d_proker['id_bidang'];
$nama_bidang = $d_proker['nama_bidang'];
$status = $d_proker['status'];
$status_proker = [
  'Diusulkan', // 0
  'Persiapan', // 1
  'Menunggu Verivikasi KP', // 2
  'Revisi KP', // 3
  'Menunggu Verivikasi Bidang Bersangkutan', // 4
  'Bidang Melakukan Banding', // 5
  'Persiapan Usulan Ke Bidang Lain', // 6
  'Pelaksanaan', // 7
  'Laporan Dan Evaluasi', // 8
  'Selesai', // 9
  99=>'Di Tolak'];
 ?>
<div class="box-header with-border">
  <h3 class="box-title">Detail Proker <small><?php echo $nama_bidang ?></small></h3>

  <div class="box-tools pull-right">
    
    <a href="?a=<?php echo $menu ?>" class="btn btn-info btn-sm">Kembali</a>
    <?php if ($bidang!=1) { 
      if ($status==1) { ?>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#additem">Tambah Item</a>
    <a href="form/proker/update_status_proker.php?metode=1&id_proker=<?php echo $id_proker ?>&status=2" class="btn btn-info btn-sm" onclick="return confirm('Apakah anda yakin sudah selesai melakukan persiapan.? \nPersiapan tidak bisa lagi di edit jika dilanjutkan.!')">Selesai Persiapan</a>
      
    <?php } // akhir dari if ($status==1) 
    else if ($status==3) { ?>
      <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#additem">Tambah Item</a>
      <a href="form/proker/update_status_proker.php?metode=1&id_proker=<?php echo $id_proker ?>&status=2" class="btn btn-info btn-sm" onclick="return confirm('Apakah anda yakin sudah selesai melakukan revisi.? \Revisi tidak bisa lagi di edit jika dilanjutkan.!')">Selesai Revisi</a>
    <?php } // akhir elseif ($status==3) 
    else if ($status==4) { ?>
      <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#verivikasi_bidang">Verivikasi</a>
    <?php } // akhir elseif ($status==4) 
    else if ($status==5) { ?>
      <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#additem">Tambah Item</a>
      <a href="form/proker/update_status_proker.php?metode=1&id_proker=<?php echo $id_proker ?>&status=2" class="btn btn-info btn-sm" onclick="return confirm('Apakah anda yakin sudah selesai melakukan banding.? \nBanding tidak bisa lagi di edit jika dilanjutkan.!')">Selesai Banding</a>
    <?php } // akhir elseif ($status==5) 
  }else{ 
    if ($status==2) {?>
      <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#verivikasi_kp">Verivikasi </a>

    <?php } //akhir if ($status==1) 
      } // akhir else dari ($status=='') ?>
    <a href="form/proker/hapus_proker.php?id=<?php echo $id_proker ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakkin.?')">Hapus</a>
    <a href="?a=edit_proker&id=<?php echo $id_proker ?>" class="btn btn-warning btn-sm">Edit</a>
  </div>



<form action="form/proker/update_status_proker.php?metode=2&id_proker=<?php echo $id_proker ?>" method="post" enctype="multipart/form-data">
<div class="modal fade" id="verivikasi_kp">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Verivikasi Proker</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" name="id_proker" class="form-control" value="<?php echo $id_proker ?>" >
              <div class="form-group">
                  <label>Keputusan</label>
                  <select  name="status" class="form-control">
                    <option value="4">Lanjut</option>
                    <option value="3">Revisi</option>
                   
                  </select>
              </div> 
              <div class="form-group">
                  <label>Catatan</label>
                  <textarea name="catatan" class="form-control" rows="5" ></textarea>
              </div> 
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan </button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>

<form action="form/proker/update_status_proker.php?metode=3&id_proker=<?php echo $id_proker ?>" method="post" enctype="multipart/form-data">
<div class="modal fade" id="verivikasi_bidang">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Verivikasi Proker <small></small></h4>
              </div>
              <div class="modal-body">
                  
              <div class="form-group">
                  <label>Keputusan</label>
                  <select  name="status" class="form-control">
                    <option value="6">Lanjut</option>
                    <option value="5">Banding</option>
                   
                  </select>
              </div> 
              <div class="form-group">
                  <label>Catatan</label>
                  <textarea name="catatan" class="form-control" rows="5" ></textarea>
              </div> 
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan </button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


<form action="form/proker/simpan_detail_proker.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="additem">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Item</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" name="id_proker" class="form-control" value="<?php echo $id_proker ?>" >
                  <input type="hidden" name="nama_bidang" class="form-control" value="<?php echo $nama_bidang ?>" >
                  <input type="hidden" name="id_bidang" class="form-control" value="<?php echo $id_bidang ?>" >
              <div class="form-group">
                  <label>Bidang Yang Terlibat</label>
                  <select  name="bidang_terlibat" class="form-control" id="bidang_terlibat">
                    <option value="">Tidak ada bidang terlibat</option>
                    <?php 
                      $q_bidang = mysqli_query($conn, "SELECT * from bidang where id_bidang not in (1)");
                      while ($d_bidang = mysqli_fetch_array($q_bidang)) { ?>
                        <option value="<?php echo $d_bidang['id_bidang'] ?>"><?php echo $d_bidang['nama_bidang'] ?></option>
                      <?php } ?>
                  </select>
              </div> 
              <div class="form-group" id="f_keterangan">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="form-control" required ></textarea>
              </div> 
               <div class="form-group" id="f_sapras" hidden="true">
                  <label>Sarana Dan Prasarana</label>
                  <select  name="sarana_prasarana" class="form-control">
                  <?php 
                      $q_sapras = mysqli_query($conn, "SELECT * from sarana_prasarana");
                      while ($d_sapras = mysqli_fetch_array($q_sapras)) { ?>
                        <option value="<?php echo $d_sapras['id_sapras'] ?>"><?php echo $d_sapras['nama_sapras'] ?></option>
                      <?php } ?>
                  </select>
              </div> 
              <div class="form-group" id="f_qty" hidden="true">
                  <label>Jumlah Item</label>
                  <input type="number" name="qty" class="form-control"  >
              </div> 
              <div class="form-group" id="f_biaya_satuan" hidden="true">
                  <label>Biaya Satuan</label>
                  <input type="number" name="biaya" class="form-control"  >
              </div> 
             
           <script type="text/javascript">
              $('#bidang_terlibat').change(function(){
                var bidang = $('#bidang_terlibat').val();
                $('#f_qty').hide();
                $('#f_biaya_satuan').hide();
                $('#f_sapras').hide();
                if (bidang==3) {
                  $('#f_qty').show();
                  $('#f_biaya_satuan').show();
                } 
                else if (bidang==6) {
                  $('#f_qty').show();
                  $('#f_sapras').show();
                }
              });
            </script>
 
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
</div>
<hr>
<?php 
  
  $no=1;
 ?>

 <table class="table">
   <tr>
     <td>Nama Proker</td>
     <td>:</td>
     <td><?php echo $d_proker['nama_proker'] ?></td>
   </tr>
   <tr>
     <td>Keterangan</td>
     <td>:</td>
     <td><?php echo $d_proker['keterangan'] ?></td>
   </tr>
   <tr>
      <td>Status</td>
     <td>:</td>
     <td>[<?php echo $d_proker['status'] ?>] <?php echo $status_proker[$d_proker['status']] ?></td>
   </tr>
   <?php if ($status > 1) { ?>
   <tr>
      <td>Komentar</td>
     <td>:</td>
     <td>
      <?php 
        $q_komen = mysqli_query($conn, "SELECT * from komentar_proker where id_proker='$id_proker' and status='$status' order by id_komentar_proker desc");
        $d_komen = mysqli_fetch_array($q_komen);
        echo $d_komen['catatan'] =='' ? '-' : $d_komen['catatan'];
         ?>
     </td>
   </tr>
   <?php } ?>
 </table>
 <hr>

<div class="box-header with-border">
  <h3 class="box-title">Caption</h3>
</div>
 <?php
 if ($menu=='proker') {
    $q_bidang_terlibat = mysqli_query($conn, "SELECT dp.id_bidang_terlibat, b.nama_bidang from detail_proker dp left join bidang b on dp.id_bidang_terlibat=b.id_bidang group by dp.id_bidang_terlibat");
 }else{
 $q_bidang_terlibat = mysqli_query($conn, "SELECT dp.id_bidang_terlibat, b.nama_bidang from detail_proker dp left join bidang b on dp.id_bidang_terlibat=b.id_bidang where dp.id_bidang_terlibat='$bidang' group by dp.id_bidang_terlibat");
 }
 while($d_bidang_terlibat = mysqli_fetch_array($q_bidang_terlibat)){ 
  $id_bidang_terlibat = $d_bidang_terlibat['id_bidang_terlibat'];?>
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $d_bidang_terlibat['nama_bidang'] ?></h3>
  </div>
  <div class="box-body">
   
  </div>
</div>
 <?php 
 } // akhir while($d_bidang_terlibat = mysqli_fetch_array($q_bidang_terlibat)) ?>
















 






 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        
        <td>Bidang Yang Terlibat</td>
        <td>Keterangan</td>
        <td>Jumlah</td>
        <td>Biaya</td>
        <td>Total</td>
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  $q1 = mysqli_query($conn, "SELECT * from detail_proker dp 
    left join bidang b on dp.id_bidang_terlibat = b.id_bidang 
    left join sarana_prasarana sp on dp.id_sapras = sp.id_sapras 
    where id_proker='$id_proker'");
  $totalbiaya = 0;
  while ($d1=mysqli_fetch_array($q1)) { 

    $bidangterlibat = $d1['id_bidang_terlibat'];
    if ($bidangterlibat==6) {
      $keterangan = $d1['nama_sapras'];
    }else {
      $keterangan = $d1['keterangan'];
    }

    $total = $d1['biaya_diusulkan'] * $d1['qty'];
    $totalbiaya+= $total;
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
  
    
    <td><?php echo $d1['nama_bidang'] ?></td>
    <td><?php echo $keterangan ?></td>
    <td><?php echo number_format($d1['qty']) ?></td>
    <td><?php echo number_format($d1['biaya_diusulkan']) ?></td>
    <td><?php echo number_format($total) ?></td>

    <td>
      <?php if ($bidang==$id_bidang) { 
        if ($status==1) { ?>
          <a href="form/proker/hapus_detail_proker.php?id=<?php echo $d1['id_detail_proker'] ?>&id_proker=<?php echo $d1['id_proker'] ?>&id_bidang=<?php echo $id_bidang ?>&bidang=<?php echo $nama_bidang ?>" class="btn btn-default btn-xs">Hapus</a>    
          <a href="#" class="btn btn-default btn-xs"  data-toggle="modal" data-target="#edit_item_<?php echo $d1['id_detail_proker'] ?>">Edit</a>    
     <?php  } //akhir if ($status==1)
       }//akhir if ($bidang==$id_bidang)
     else if($bidang==1){ ?>
        bagian ketua panitia
      <?php } ?>
     </td>

<div class="modal fade" id="edit_item_<?php echo $d1['id_detail_proker'] ?>">
<form action="form/proker/simpanedit_detail_proker.php" method="post" enctype="multipart/form-data">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Item</h4>
              </div>
              <div class="modal-body">
                  
              <div class="form-group">
                  <label>Item</label>
                  <input type="text" name="item" class="form-control" required value="<?php echo $d1['item'] ?>">
              </div> 
              <div class="form-group">
                  <label>Biaya Satuan</label>
                  <input type="number" name="biaya" class="form-control" required value="<?php echo $d1['biaya_diusulkan'] ?>" >
              </div> 
              <div class="form-group">
                  <label>Jumlah Item</label>
                  <input type="number" name="qty" class="form-control" required value="<?php echo $d1['qty'] ?>" >
                  <input type="hidden" name="id" class="form-control" value="<?php echo $d1['id_detail_proker'] ?>" >
                  <input type="hidden" name="id_proker" class="form-control" value="<?php echo $d1['id_proker'] ?>" >
                  <input type="hidden" name="nama_bidang" class="form-control" value="<?php echo $nama_bidang ?>" >
                  <input type="hidden" name="id_bidang" class="form-control" value="<?php echo $id_bidang ?>" >
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
</form>
        </div>
    
  </tr>
  <?php } ?>
  <tr>
    <td colspan="4">Total</td>
    <td colspan="2"><?php echo number_format($totalbiaya) ?></td>
  </tr>
</table>

<hr>
<?php if ($bidang==1 && $d_proker['status']==0) { ?>
  <div class="box-header with-border">
    <h3 class="box-title">Keputusan Pengusulan Proker <small><?php echo $nama_bidang ?></small></h3>
  </div>
  <br>
  <form action="form/proker/acc_proker.php" method="post">
    <div class="form-group">
      <label>Keputusan</label>
      <input type="hidden" name="id_proker" value="<?php echo $id_proker ?>">
      <select class="form-control" name="keputusan">
        <option value="1">Setujui</option>
        <option value="99">Tolak</option>
      </select>
    </div>
    <div class="form-group">
      <label>Catatan </label>
      <textarea class="form-control" name="catatan"></textarea>
    </div>
    <div class="form-group">
      <button class="btn btn-info btn-sm">Simpan</button>
    </div>
  </form>
<?php } ?>


<div class="alert alert-info">Untuk item bagian selain sarana prasarana dan bendahara di diskusikan kembaali</div>