<?php 
  $id_pengadaan = $_GET['id'];
  $bidang_pengusul = $_GET['bidang_pengusul'];
  $menu = $_GET['menu'];
$kategori_porker = ['Ditentukan'=>'Ditugaskan oleh ketua panitia','Diusulkan'=>'Diusulkan oleh bidang ke ketua panitia'];
$q_pengadaan = mysqli_query($conn, "SELECT * from pengadaan p left join bidang b on p.id_bidang=b.id_bidang where id_pengadaan='$id_pengadaan'");
$d_pengadaan = mysqli_fetch_array($q_pengadaan);
$id_bidang = $d_pengadaan['id_bidang'];
$nama_bidang = $d_pengadaan['nama_bidang'];
$nama_pengadaan = $d_pengadaan['item'];
$status = $d_pengadaan['status'];
$status_pengadaan = [
  'Diusulkan', // 0 baru diusulkan bidang
  'Di Tolak KP', // 1 setelah di lihat KP 
  'Menunggu Pencairan',// 2 jika di ACC kp
  'Pencairan Ditolak', // 3
  'Pencairan Disetujui', // 4
];

 ?>
<div class="box-header with-border">
  <h3 class="box-title">Detail pengadaan</small></h3>

  <div class="box-tools pull-right">
    
    <a href="?a=<?php echo $menu ?>" class="btn btn-info btn-sm">Kembali</a>
    <?php if (($status==3 || $status==0) && $bidang==1) { ?>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#acc_kp">Keputusan Pengadaan</a>
    <?php } 
    elseif ($status==2 && $bidang==3) { ?>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#acc_biaya">Keluarkan Biaya</a>
    <?php } 
   
   if ($bidang==$bidang_pengusul && ($status==0 || $status==1)) { ?>
    <a href="form/pengadaan/hapus_pengadaan.php?id=<?php echo $id_pengadaan ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
    <a href="?a=edit_pengadaan&id=<?php echo $id_pengadaan ?>&menu=<?php echo $menu ?>&bidang_pengusul=<?php echo $bidang_pengusul ?>" class="btn btn-warning btn-sm">Edit</a>
    <?php } ?>
    
  </div>


</div>
<hr>



<form action="form/pengadaan/simpan_keputusan_pengadaan.php?id_pengadaan=<?php echo $id_pengadaan ?>" method="post" enctype="multipart/form-data">
<div class="modal fade" id="acc_kp">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Keputusan</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" name="menu" value="<?php echo $menu ?>">
                  <input type="hidden" name="bidang_pengusul" value="<?php echo $bidang_pengusul ?>">
              <div class="form-group">
                  <label>Keputusan</label>
                	<select class="form-control" name="keputusan">
                		<?php 
                		if ($status==0 || $status==3) {
	                		$keputusan = [1=>'Tolak', 2=>'Setujui'];
                		}
                	else{
	                		$keputusan = [];
                		}
                		foreach ($keputusan as $k => $v) { ?>
	                		<option value="<?php echo $k ?>"><?php echo $v ?></option>
	                	<?php } ?>
                	</select>
              </div> 
              <div class="form-group">
                  <label>Komentar</label>
                  <textarea name="komentar" class="form-control"></textarea>
              </div> 
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Keputusan</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>

<form action="form/pengadaan/simpan_pengeluaran_pengadaan.php?id_pengadaan=<?php echo $id_pengadaan ?>" method="post" enctype="multipart/form-data">
<div class="modal fade" id="acc_biaya">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pengeluaran Biaya Pengadaan</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" name="menu" value="<?php echo $menu ?>">
                  <input type="hidden" name="bidang_pengusul" value="<?php echo $bidang_pengusul ?>">
                  <input type="hidden" name="nama_bidang" value="<?php echo $nama_bidang ?>">
                  <input type="hidden" name="item" value="<?php echo $nama_pengadaan ?>">
                  <input type="hidden" name="qty" value="<?php echo $d_pengadaan['qty'] ?>">
                  <input type="hidden" name="harga" value="<?php echo $d_pengadaan['harga_satuan'] ?>">



                   <table class="table">
                    
                     <tr>
                      <td>Item</td>
                       <td>:</td>
                       <td><?php echo $d_pengadaan['item'] ?></td>
                     </tr>
                     <tr>
                      <td>Jenis Pengadaan</td>
                       <td>:</td>
                       <td><?php echo $d_pengadaan['jenis'] ?></td>
                     </tr>
                     <tr>
                      <td>Harga Satuan</td>
                       <td>:</td>
                       <td><?php echo $d_pengadaan['harga_satuan'] ?></td>
                     </tr>
                     <tr>
                      <td>Banyak Pengadaan</td>
                       <td>:</td>
                       <td><?php echo $d_pengadaan['qty'] ?></td>
                     </tr>
                     <tr>
                      <td>Total Biaya</td>
                       <td>:</td>
                       <td><?php echo number_format($d_pengadaan['qty'] * $d_pengadaan['harga_satuan']) ?></td>
                     </tr>
                    
                   </table>
              <div class="form-group">
                  <label>Keputusan</label>
                  <select class="form-control" name="keputusan" id="keputusan">
                    <?php 
                    if ($status==0) {
                      $keputusan = [1=>'Tolak', 2=>'Setujui'];
                    }
                    if ($status==2) {
                      $keputusan = [3=>'Tolak', 4=>'Setujui'];
                    }
                  else{
                      $keputusan = [];
                    }
                    foreach ($keputusan as $k => $v) { ?>
                      <option value="<?php echo $k ?>"><?php echo $v ?></option>
                    <?php } ?>
                  </select>
              </div> 
              <div class="form-group">
                  <label>Komentar</label>
                  <textarea name="komentar" class="form-control"></textarea>
              </div> 
              <div class="form-group" id="f_file" hidden="true">
                  <label>File</label>
                  <input type="file" name="file">
              </div> 
             

               <script type="text/javascript">
              $('#keputusan').change(function(){
                var keputusan = $('#keputusan').val();
                $('#f_file').hide();
              
                if (keputusan==4) {
                  $('#f_file').show();
                  
                } 
                else{
                  $('#f_file').hide();
                  
                }
              });
            </script>
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Keputusan</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>

<?php 
  
  $no=1;
 ?>

 <table class="table">
   <tr>
    <td>Pengusul</td>
     <td>:</td>
     <td><?php echo $d_pengadaan['nama_bidang'] ?></td>
   </tr>
   <tr>
    <td>Item</td>
     <td>:</td>
     <td><?php echo $d_pengadaan['item'] ?></td>
   </tr>
   <tr>
    <td>Keterangan</td>
     <td>:</td>
     <td><?php echo $d_pengadaan['keterangan'] ?></td>
   </tr>
   <tr>
    <td>Jenis Pengadaan</td>
     <td>:</td>
     <td><?php echo $d_pengadaan['jenis'] ?></td>
   </tr>
   <tr>
    <td>Harga Satuan</td>
     <td>:</td>
     <td><?php echo $d_pengadaan['harga_satuan'] ?></td>
   </tr>
   <tr>
    <td>Banyak Pengadaan</td>
     <td>:</td>
     <td><?php echo $d_pengadaan['qty'] ?></td>
   </tr>
   <tr>
  <tr>
    <td>Total Biaya</td>
     <td>:</td>
     <td><?php echo number_format($d_pengadaan['qty'] * $d_pengadaan['harga_satuan']) ?></td>
   </tr>
  
    <tr>
       <td>File Proposal</td>
       <td>:</td>
       <td>
         <a href="form/pengadaan/file/proposal/<?php echo $d_pengadaan['file'] ?>" target="_blank">Lihat Proposal</a>
       </td>
     </tr>
   <tr>
      <td>Status</td>
     <td>:</td>
     <td>[<?php echo $d_pengadaan['status'] ?>] <?php echo $status_pengadaan[$d_pengadaan['status']] ?></td>
   </tr>
   <?php if ($d_pengadaan['status']>=1) { ?>
   <tr>
      <td>Komentar KP</td>
     <td>:</td>
     <td><?php echo $d_pengadaan['komentar_kp'] ?></td>
   </tr>
 <?php } if ($d_pengadaan['status']>2) { ?>
   <tr>
      <td>Komentar Bendahara</td>
     <td>:</td>
     <td><?php echo $d_pengadaan['komentar_bendahara'] ?></td>
   </tr>
 <?php } ?>

 </table>