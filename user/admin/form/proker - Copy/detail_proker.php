<?php 
  $id_proker = $_GET['id'];
  $menu = $_GET['menu'];
$kategori_porker = ['Ditentukan'=>'Ditugaskan oleh ketua panitia','Diusulkan'=>'Diusulkan oleh bidang ke ketua panitia'];
$q_proker = mysqli_query($conn, "SELECT * from proker p left join bidang b on p.id_bidang=b.id_bidang where id_proker='$id_proker'");
$d_proker = mysqli_fetch_array($q_proker);
$id_bidang = $d_proker['id_bidang'];
$nama_bidang = $d_proker['nama_bidang'];
$nama_proker = $d_proker['nama_proker'];
$status = $d_proker['status'];
$status_proker = [
  'Diusulkan', // 0
  'Persiapan', // 1
  'Menunggu Verivikasi KP', // 2
  'Revisi KP', // 3
  'Menunggu Verivikasi Bidang Bersangkutan', // 4
  'Bidang Melakukan Banding', // 5
  'Persiapan Usulan Ke Bidang Lain', // 6
  'Pelaksanaan Proker', // 7
  'Laporan Dan Evaluasi', // 8
  'Selesai', // 9
  99=>'Di Tolak'];
 ?>
<div class="box-header with-border">
  <h3 class="box-title">Detail Proker <small><?php echo $nama_bidang ?></small></h3>

  <div class="box-tools pull-right">
    
    <a href="?a=<?php echo $menu ?>" class="btn btn-info btn-sm">Kembali</a>
    <?php if ($bidang!=1 && $bidang == $id_bidang) { 
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
    else if ($status==6) { ?>
      <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#konfirmasi_pelaksanaan">Lakukan Pelaksanaan Proker</a>
      <div class="modal fade" id="konfirmasi_pelaksanaan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Apakah anda yakin melakukan pelaksanaan proker.?</h4>
              </div>
              <div class="modal-body">
         
              <div class="form-group" id="f_keterangan">
                  Data tidak bisa di ubah lagi jika sudah melakukan pelaksanaan proker
              </div> 
               
 
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <a href="form/proker/laksanakan_proker.php?id_proker=<?php echo $id_proker ?>&menu=<?php echo $menu ?>" class="btn btn-primary">Lanjut</a>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

      
    <?php } // akhir elseif ($status==6)

    else if ($status==7) { ?>
      <a href="form/proker/selesai_pelaksanakan_proker.php?id_proker=<?php echo $id_proker ?>&menu=<?php echo $menu ?>" class="btn btn-info btn-sm" onclick="return confirm('Apakah anda yakin sudah selesai melakukan proker.?')">Selesai Pelaksanaan</a>
    <?php } // akhir elseif ($status==7)  

    else if ($status==8) { ?>
      <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#akhiri_proker">Akhiri Proker</a>
	      <div class="modal fade" id="akhiri_proker">
      <form action="form/proker/akhiri_proker.php?id_proker=<?php echo $id_proker ?>&menu=<?php echo $menu ?>" method="post" enctype="multipart/form-data">
	          <div class="modal-dialog">
	            <div class="modal-content">
	              <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title">Silahkan menambahkan laporan sebelum mengakhiri proker.? <br><small><?php echo $d_proker['nama_proker'] ?></small></h4>
	              </div>
	              <div class="modal-body">
	         
	              <div class="form-group">
	                  <label>Laporan</label>
	                  <textarea class="form-control" rows="6" name="laporan" required></textarea>
	              </div> 
	              <div class="form-group">
	                  <label>Evaluasi</label>
	                  <textarea class="form-control" rows="6" name="evaluasi" required></textarea>
	              </div> 
	              <div class="form-group">
	                  <label>File Pendukung</label>
	                  <input type="file" name="file" required >
	              </div> 
	               
	 
	            </div>
	              <div class="modal-footer">
	                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
	                <button class="btn btn-primary">Akhiri Laporan</button>
	               
	              </div>
	            </div>
	            <!-- /.modal-content -->
	          </div>
	          <!-- /.modal-dialog -->
	    </form>
	        </div>
    <?php } // akhir elseif ($status==8)  
    ?>
    <a href="form/proker/hapus_proker.php?id=<?php echo $id_proker ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakkin.?')">Hapus</a>
    <a href="?a=edit_proker&id=<?php echo $id_proker ?>" class="btn btn-warning btn-sm">Edit</a>
    <?php 
  }else{ 
    if ($status==2) {?>
      <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#verivikasi_kp">Verivikasi </a>

    <?php } //akhir if ($status==2) 
      } // akhir else dari ($status=='') ?>
    
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
                  <input type="hidden" name="menu" class="form-control" value="<?php echo $menu ?>" >
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
                <button type="submit" class="btn btn-primary">Simpan</button>
               
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
     <td>Kategori</td>
     <td>:</td>
     <td><?php echo $kategori_porker[$d_proker['kategori']] ?></td>
   </tr>
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
   <?php if ($status==9) { 
    $q_laporan = mysqli_query($conn, "SELECT * from laporan_proker where id_proker='$id_proker'");
    $d_laporan = mysqli_fetch_array($q_laporan);?>
     <tr>
       <td>Laporan</td>
       <td>:</td>
       <td><?php echo $d_laporan['laporan'] ?></td>
     </tr>
     <tr>
       <td>Evaluasi</td>
       <td>:</td>
       <td><?php echo $d_laporan['evaluasi'] ?></td>
     </tr>
     <tr>
       <td>File Pendukung</td>
       <td>:</td>
       <td><a href="form/proker/file/<?php echo $d_laporan['file'] ?>" target="_blank">Lihat file pendukung</a></td>
     </tr>
    <?php  }  
   } ?>
 </table>
 <hr>

<div class="box-header with-border">
  <h3 class="box-title">RAB & RAK</h3>
</div>
 <?php
 if ($menu=='proker') {
    $q_bidang_terlibat = mysqli_query($conn, "SELECT dp.id_bidang_terlibat, b.nama_bidang from detail_proker dp left join bidang b on dp.id_bidang_terlibat=b.id_bidang where dp.id_proker='$id_proker' group by dp.id_bidang_terlibat");
 }else{
 $q_bidang_terlibat = mysqli_query($conn, "SELECT dp.id_bidang_terlibat, b.nama_bidang from detail_proker dp left join bidang b on dp.id_bidang_terlibat=b.id_bidang where dp.id_bidang_terlibat='$bidang' and dp.id_proker='$id_proker' group by dp.id_bidang_terlibat");
 }
 while($d_bidang_terlibat = mysqli_fetch_array($q_bidang_terlibat)){ 
  $id_bidang_terlibat = $d_bidang_terlibat['id_bidang_terlibat'];
  $nama_bidang_terlibat = $d_bidang_terlibat['nama_bidang'] == '' ? 'Tidak ada bidang terlibat' : $d_bidang_terlibat['nama_bidang'] ;
  ?>
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $nama_bidang_terlibat ?></h3>
  </div>
  <div class="box-body">
   <?php if ($d_bidang_terlibat['id_bidang_terlibat']=='') { ?>
   		<table class="table">
   			<tr>
   				<td>No</td>
   				<td>Keterangan</td>
   			</tr>
   		</table>
   <?php }
   elseif ($d_bidang_terlibat['id_bidang_terlibat']==2) { ?>

   <?php } //akhir if ($d_bidang_terlibat['id_bidang_terlibat']==2)
   else  if ($d_bidang_terlibat['id_bidang_terlibat']==3) { ?>
      <table class="table table-striped table-bordered" id="example1">
          <thead>
            <tr>
              <td>No</td>
              <td>Keterangan</td>
              <td>Jumlah</td>
              <td>Biaya</td>
              <td>Total</td>
              <?php if ($status >=2) { ?>
                <td>Catatan KP</td>
              <?php }
              if ($status>=6){ ?>
                <td>Catatan <?php echo $nama_bidang ?></td>
              <?php } ?>
              <td>Option</td>
            </tr>
          </thead>
        <?php 
        $q1 = mysqli_query($conn, "SELECT * from detail_proker dp 
          left join bidang b on dp.id_bidang_terlibat = b.id_bidang 
          left join sarana_prasarana sp on dp.id_sapras = sp.id_sapras 
          where id_proker='$id_proker' and dp.id_bidang_terlibat='$id_bidang_terlibat'");
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
             
            
              
              <td><?php echo $keterangan ?></td>
              <td><?php echo number_format($d1['qty']) ?></td>
              <td><?php echo number_format($d1['biaya_diusulkan']) ?></td>
              <td><?php echo number_format($total) ?></td>
               <?php if ($status >=2) { ?>
                <td><?php echo $d1['catatan_kp'] ?></td>
              <?php }
              if ($status>=6){ ?>
                <td><?php echo $d1['catatan_bidang_terlibat'] ?></td>
              <?php } ?>

              <td>
                <?php if ($bidang==$id_bidang) { 
                  if ($status==1 || $status==3 ||  $status==5) { ?>
                    <a href="form/proker/hapus_detail_proker.php?id=<?php echo $d1['id_detail_proker'] ?>&id_proker=<?php echo $d1['id_proker'] ?>&id_bidang=<?php echo $id_bidang ?>&bidang=<?php echo $nama_bidang ?>" class="btn btn-default btn-xs">Hapus</a>    
                    <a href="#" class="btn btn-default btn-xs"  data-toggle="modal" data-target="#edit_item_<?php echo $d1['id_detail_proker'] ?>">Edit</a>    
               <?php  } //akhir if ($status==1)
                  elseif ($status==6) { 
                  	if ($d1['status']!=1) {
                  		echo "Menunggu Pencairan";
                  	}else{
                  		echo "Sudah dicairkan";
                  	}?>
                       
               <?php  } //akhir if ($status==1)
                  
                 }//akhir if ($bidang==$id_bidang)
               else if($bidang==1){ 
                if ($status==2) { ?>
                  <a href="#" class="btn btn-default btn-xs"  data-toggle="modal" data-target="#catatan<?php echo $d1['id_detail_proker'] ?>">Catatan</a>    
                <?php }
                 } 
               else if($bidang==3){ 
               		if ($status==6) { 
                  		if ($d1['status']!=1) { ?>
                        <a href="#" class="btn btn-default btn-xs"  data-toggle="modal" data-target="#catatan<?php echo $d1['id_detail_proker'] ?>">Catatan</a> 
                    <a href="form/proker/status_6_bendahara.php?id=<?php echo $d1['id_detail_proker'] ?>&id_proker=<?php echo $d1['id_proker'] ?>&qty=<?php echo $d1['qty'] ?>&biaya=<?php echo $d1['biaya_diusulkan'] ?>&status=<?php echo $d1['status'] ?>&menu=<?php echo $menu  ?>&keterangan=untuk pembeelian <?php echo $keterangan ?> dari proker <?php echo $nama_proker ?>" class="btn btn-default btn-xs">Jadikan Pengeluaran</a>    
               <?php  }else{ ?>
               	<a href="#" class="btn btn-default btn-xs"  data-toggle="modal" data-target="#catatan<?php echo $d1['id_detail_proker'] ?>">Catatan</a>
               <?php }

               		}?>
                <?php } ?>
               </td>
                    <div class="modal fade" id="edit_item_<?php echo $d1['id_detail_proker'] ?>">
                    <form action="form/proker/simpanedit_detail_proker.php" method="post" enctype="multipart/form-data">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Edit Item</h4>
                                  </div>
                                  <div class="modal-body">
                                      <input type="hidden" name="id_proker" class="form-control" value="<?php echo $id_proker ?>" >
                                      <input type="hidden" name="nama_bidang" class="form-control" value="<?php echo $nama_bidang ?>" >
                                      <input type="hidden" name="id_bidang" class="form-control" value="<?php echo $id_bidang ?>" >
                                      <input type="hidden" name="menu" class="form-control" value="<?php echo $menu ?>" >
                                  <div class="form-group">
                                      <label>Bidang Yang Terlibat</label>
                                      <select  name="bidang_terlibat" class="form-control" id="bidang_terlibat_<?php echo $d1['id_detail_proker'] ?>">
                                        <option value="">Tidak ada bidang terlibat</option>
                                        <?php 
                                          $q_bidang = mysqli_query($conn, "SELECT * from bidang where id_bidang not in (1)");
                                          while ($d_bidang = mysqli_fetch_array($q_bidang)) { ?>
                                            <option value="<?php echo $d_bidang['id_bidang'] ?>" <?php if($d_bidang['id_bidang']==$bidangterlibat){echo "selected";} ?>><?php echo $d_bidang['nama_bidang'] ?></option>
                                          <?php } ?>
                                      </select>
                                  </div> 
                                  <div class="form-group" id="f_keterangan_<?php echo $d1['id_detail_proker'] ?>">
                                      <label>Keterangan</label>
                                      <textarea name="keterangan" class="form-control" required ><?php echo $d1['keterangan'] ?></textarea>
                                  </div> 
                                   <div class="form-group" id="f_sapras_<?php echo $d1['id_detail_proker'] ?>" hidden="true">
                                      <label>Sarana Dan Prasarana</label>
                                      <select  name="sarana_prasarana" class="form-control">
                                      <?php 
                                          $q_sapras = mysqli_query($conn, "SELECT * from sarana_prasarana");
                                          while ($d_sapras = mysqli_fetch_array($q_sapras)) { ?>
                                            <option value="<?php echo $d_sapras['id_sapras'] ?>"><?php echo $d_sapras['nama_sapras'] ?></option>
                                          <?php } ?>
                                      </select>
                                  </div> 
                                  <div class="form-group" id="f_qty_<?php echo $d1['id_detail_proker'] ?>" hidden="true">
                                      <label>Jumlah Item</label>
                                      <input type="number" name="qty" class="form-control" value="<?php echo $d1['qty'] ?>"  >
                                  </div> 
                                  <div class="form-group" id="f_biaya_satuan_<?php echo $d1['id_detail_proker'] ?>" hidden="true">
                                      <label>Biaya Satuan</label>
                                      <input type="number" name="biaya" class="form-control" value="<?php echo $d1['biaya_diusulkan'] ?>" >
                                  </div> 
                                 
                               <script type="text/javascript">
                                    var bidang_edit_3 = $('#bidang_terlibat_<?php echo $d1['id_detail_proker'] ?>').val();
                                    if (bidang_edit_3==3) {
                                      $('#f_qty_<?php echo $d1['id_detail_proker'] ?>').show();
                                      $('#f_biaya_satuan_<?php echo $d1['id_detail_proker'] ?>').show();
                                    } 
                                  $('#bidang_terlibat_<?php echo $d1['id_detail_proker'] ?>').change(function(){
                                    $('#f_qty_<?php echo $d1['id_detail_proker'] ?>').hide();
                                    $('#f_biaya_satuan_<?php echo $d1['id_detail_proker'] ?>').hide();
                                    $('#f_sapras_<?php echo $d1['id_detail_proker'] ?>').hide();
                                    if (bidang_edit_3==3) {
                                      $('#f_qty_<?php echo $d1['id_detail_proker'] ?>').show();
                                      $('#f_biaya_satuan_<?php echo $d1['id_detail_proker'] ?>').show();
                                    } 
                                    else if (bidang_edit_3==6) {
                                      $('#f_qty_<?php echo $d1['id_detail_proker'] ?>').show();
                                      $('#f_sapras_<?php echo $d1['id_detail_proker'] ?>').show();
                                    }
                                  });
                                </script>
                     
                                </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                   
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                    </form>
                  </div>



                  <div class="modal fade" id="catatan<?php echo $d1['id_detail_proker'] ?>">
                    <form action="form/proker/catatan_bidang.php" method="post" enctype="multipart/form-data">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Catatan dari <?php echo $bidang==1 ? 'Ketua Panitia' : $nama_bidang_terlibat ?></h4>
                                  </div>
                                  <div class="modal-body">
                                      <input type="hidden" name="id" class="form-control" value="<?php echo $d1['id_detail_proker'] ?>" >
                                      <input type="hidden" name="id_proker" class="form-control" value="<?php echo $id_proker ?>" >
                                      <input type="hidden" name="nama_bidang" class="form-control" value="<?php echo $nama_bidang ?>" >
                                      <input type="hidden" name="id_bidang" class="form-control" value="<?php echo $bidang ?>" >
                                      <input type="hidden" name="menu" class="form-control" value="<?php echo $menu ?>" >

                                  <div class="form-group" id="f_keterangan_<?php echo $d1['id_detail_proker'] ?>">
                                      <label>Komentar</label>
                                      <textarea name="keterangan" class="form-control" ></textarea>
                          
                     
                                </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                   
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
   <?php } //akhir if ($d_bidang_terlibat['id_bidang_terlibat']==3)

   else  if ($d_bidang_terlibat['id_bidang_terlibat']==4) { ?>

   <?php } //akhir if ($d_bidang_terlibat['id_bidang_terlibat']==4)
   
   else  if ($d_bidang_terlibat['id_bidang_terlibat']==5) { ?>

   <?php } //akhir if ($d_bidang_terlibat['id_bidang_terlibat']==5)
   
   else  if ($d_bidang_terlibat['id_bidang_terlibat']==6) { ?>














      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <td>No</td>
            <td>Keterangan</td>
            <td>Jumlah</td>
            <td>Option</td>
          </tr>
        </thead>
        <?php $q1 = mysqli_query($conn, "SELECT * from detail_proker dp 
          left join bidang b on dp.id_bidang_terlibat = b.id_bidang 
          left join sarana_prasarana sp on dp.id_sapras = sp.id_sapras 
          where id_proker='$id_proker' and dp.id_bidang_terlibat='$id_bidang_terlibat'");
        $totalbiaya = 0;
        $no=1;
        while ($d1=mysqli_fetch_array($q1)) {  
        	$id_sapras = $d1['id_sapras'];
        	$q_terpakai = mysqli_query($conn, "SELECT sum(dipinjamkan) as dipinjamkan from peminjaman where id_sapras = '$id_sapras' and status='0'");
        	$d_terpakai = mysqli_fetch_array($q_terpakai);
        	$tersedia = $d1['stok'] - $d_terpakai['dipinjamkan'];
        	?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d1['nama_sapras'] ?></td>
            <td><?php echo $d1['qty'] ?></td>
            
              <td>
                <?php if ($bidang==$id_bidang) { 
                  if ($status==1 || $status==3 || $status==4|| $status==5) { ?>
                    <a href="form/proker/hapus_detail_proker.php?id=<?php echo $d1['id_detail_proker'] ?>&id_proker=<?php echo $d1['id_proker'] ?>&id_bidang=<?php echo $id_bidang ?>&bidang=<?php echo $nama_bidang ?>" class="btn btn-default btn-xs">Hapus</a>    
                    <a href="#" class="btn btn-default btn-xs"  data-toggle="modal" data-target="#edit_item_<?php echo $d1['id_detail_proker'] ?>">Edit</a>    
               <?php  } //akhir if ($status==1)
                  elseif ($status==6) { 
                  	if ($d1['status']!=1) {
                  		echo "Menunggu Peminjaman";
                  	}else{
                  		echo "Sudah Dipinjamkan";
                  	}?>
                       
               <?php  } //akhir if ($status==1)
                  
                 }//akhir if ($bidang==$id_bidang)
               else if($bidang==1){ ?>
                  bagian ketua panitia
                <?php } 
               else if($bidang==6){ 
               		if ($status==6) { 
                  		if ($d1['status']!=1) { ?>
                    <a href="#" class="btn btn-default btn-xs"  data-toggle="modal" data-target="#pinjamkan_item_<?php echo $d1['id_detail_proker'] ?>">Pinjamkan</a>    
               <?php  }else{
               	echo "sudah dicairkan";
               }

               		}?>
                <?php } ?>
               </td>
          </tr>
          
          <div class="modal fade" id="pinjamkan_item_<?php echo $d1['id_detail_proker'] ?>">
                    <form action="form/proker/status_6_sapras.php" method="post" enctype="multipart/form-data">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Pinjamkan Item</h4>
                                  </div>
                                  <div class="modal-body">
                                  <div class="form-group">
                                      
                                  </div> 
                                  <div class="form-group">
                                      <label>Barang yang dipinjam </label>
                                      <input type="text" name="biaya" class="form-control" required value="<?php echo $d1['nama_sapras'] ?>" readonly>
                                  </div> 
                                  <div class="form-group">
                                      <label>Banyak Dipinjam </label>
                                      <input type="text" name="biaya" class="form-control" required value="<?php echo $d1['qty'] ?>" readonly>
                                  </div> 
                                  <div class="form-group">
                                      <label>Tersedia</label>
                                      <input type="text" name="tersedia" class="form-control" required value="<?php echo $tersedia ?>" readonly>
                                  </div> 
                                 
                                  <div class="form-group">
                                      <label>Banyak yang bisa dipinjamkan </label>
                                      <input type="number" name="dipinjamkan" class="form-control" required >
                                  </div> 
                                
                                  <div class="form-group">
                                      
                                      <input type="hidden" name="id" class="form-control" value="<?php echo $d1['id_detail_proker'] ?>" >
                                      <input type="hidden" name="id_proker" class="form-control" value="<?php echo $d1['id_proker'] ?>" >
                                      <input type="hidden" name="id_sapras" class="form-control" value="<?php echo $d1['id_sapras'] ?>" >
                                      <input type="hidden" name="menu" class="form-control" value="<?php echo $menu ?>" >
                                  </div> 
                                
                                </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                   
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                    </form>
                  </div>
        <?php } // akhir while ($d1=mysqli_fetch_array($q1)) ?>
        </table>
   <?php } //akhir if ($d_bidang_terlibat['id_bidang_terlibat']==6)
    ?>
  </div>
</div>
 <?php 
 } // akhir while($d_bidang_terlibat = mysqli_fetch_array($q_bidang_terlibat)) ?>
















 







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