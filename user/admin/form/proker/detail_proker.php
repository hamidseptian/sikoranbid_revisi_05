<?php 
  $id_proker = $_GET['id'];
  $bidang_pengusul = $_GET['bidang_pengusul'];
  $menu = $_GET['menu'];
$kategori_porker = ['Ditentukan'=>'Ditugaskan oleh ketua panitia','Diusulkan'=>'Diusulkan oleh bidang'];
$q_proker = mysqli_query($conn, "SELECT * from proker p left join bidang b on p.id_bidang=b.id_bidang where id_proker='$id_proker'");
$d_proker = mysqli_fetch_array($q_proker);
$id_bidang = $d_proker['id_bidang'];
$nama_bidang = $d_proker['nama_bidang'];
$nama_proker = $d_proker['nama_proker'];
$status = $d_proker['status'];
$status_proker = [
  'Diusulkan', // 0
  'ACC Pendayagunaan', // 1
  'Revisi Pendayagunaan', // 2
  'ACC KP Dan Persiapan ', // 3 jika sudah di acc Pendayagunaan
  'Revisi KP', // 4
  'Pendistribusian', // 5 admin ditribusi melakukan pemilihan bidang lain terkait kebutuhan proker. jika sudah di distribusikan apakah bisa di edit lagi itemnya.?
  'Menunggu keputusan bidang terlibat', // 6 perbaikan item dilakukan oleh pengusul jika ada bidang yang menolak pendistribusian. jika selesai status kembali pada 5
  'Perbaikan Item', // 6 perbaikan item dilakukan oleh pengusul jika ada bidang yang menolak pendistribusian. jika selesai status kembali pada 5
  'Pengecekan kembali bidang pengusul', // 8 pada banding ini kegiatan sama dengan persiapan tapi status banding. ketika selesai banding maka kembali pada status 5
  'Banding', // 9 pada banding ini kegiatan sama dengan persiapan tapi status banding. ketika selesai banding maka kembali pada status 5
  'Pelaksanaan Proker', // 10
  'Laporan Dan Evaluasi', // 11
  'Selesai', // 12
  99=>'Di Tolak'];
 ?>
<div class="box-header with-border">
  <h3 class="box-title">Detail Proker <small><?php echo $nama_bidang ?></small></h3>

  <div class="box-tools pull-right">
    
    <a href="?a=<?php echo $menu ?>" class="btn btn-info btn-sm">Kembali</a>
    <?php if (($status==0 || $status==4) && $bidang==4) { ?>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#acc">Keputusan ACC (pendayagunaan)</a>
    <?php } 
    elseif ($status==1 && $bidang==1) { ?>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#acc">Keputusan ACC (kp)</a>
    <?php } 
    elseif (($status==3 || $status==9 )&& $bidang==$bidang_pengusul) { ?>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#additem">Tambah Item</a>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#acc">Selesai Menyusun Kebutuhan</a>
    <?php } 
    elseif (($status==5 || $status==7) && $bidang==5) { ?>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#acc">Keputusan ACC (Pendistribusian)</a>
    <?php }
    elseif ($status==6 && $bidang==5) { ?>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#acc">Keputusan ACC (Pendistribusian)</a>
    <?php } 
    elseif ($status==8 && $bidang==$bidang_pengusul) { ?>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#acc">Keputusan ACC (Bidang pengusul)</a>
    <?php } 
    elseif ($status==10 && $bidang==$bidang_pengusul) { ?>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#acc">Keputusan ACC (Selesai pelaksanaan)(Bidang pengusul)</a>
    <?php } 
    elseif ($status==11 && $bidang==$bidang_pengusul) { ?>
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
    <?php }
     elseif ($status==12) { ?> 
        <a href="form/proker/print_detail_proker.php?id=<?php echo $id_proker ?>" class="btn btn-info btn-sm" target="_blank" >Print</a>
   <?php } ?>


    <?php if ($bidang==$bidang_pengusul && $status==2) { ?>
    <a href="form/proker/hapus_proker.php?id=<?php echo $id_proker ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
    <a href="?a=edit_proker&id=<?php echo $id_proker ?>&menu=<?php echo $menu ?>&bidang_pengusul=<?php echo $bidang_pengusul ?>" class="btn btn-warning btn-sm">Edit</a>
    <?php } ?>
    
  </div>


</div>
<hr>



<form action="form/proker/simpan_keputusan_proker.php?id_proker=<?php echo $id_proker ?>" method="post" enctype="multipart/form-data">
<div class="modal fade" id="acc">
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
                		if ($status==0 || $status==4) {
	                		$keputusan = [1=>'Acc Proker (PD)', 2=>'Revisi Proker (PD)'];
                		}
                		elseif ($status==1) {
	                		$keputusan = [3=>'Acc Proker (KP)', 4=>'Revisi Proker (KP)'];
                		}
                		elseif ($status==3) {
	                		$keputusan = [5=>'Selesai Menyusun RAK dan RAB'];
                		}
                		elseif ($status==5 || $status==7) {
	                		$keputusan = [6=>'Selesai menyusun bidang terlibat untuk proker'];
                		}
                		elseif ($status==6) {
	                		$keputusan = [7=>'Perbaiki Item',8=>'Selesai menyusun dan laporkan kembali ke bidang pengusul'];
                		}
                		elseif ($status==8) {
	                		$keputusan = [10=>'Laksanakan Proker',9=>'Banding'];
                		}
                		elseif ($status==9) {
	                		$keputusan = [5=>'Selesai Banding'];
                		}
                		elseif ($status==10) {
	                		$keputusan = [11=>'Selesai Pelaksanaan Proker'];
                		}else{
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

<form action="form/proker/simpan_detail_proker.php?id_proker=<?php echo $id_proker ?>" method="post" enctype="multipart/form-data">
<div class="modal fade" id="additem">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Item Detail Proker</h4>
              </div>
              <div class="modal-body">
                  
              <div class="form-group">
                  <label>Item</label>
                	<input type="text" class="form-control" name="item">
                	<input type="hidden" class="form-control" name="id_bidang" value="<?php echo $bidang ?>">
                	<input type="hidden" class="form-control" name="menu" value="<?php echo $menu ?>">
              </div> 
              <div class="form-group">
                  <label>Keterangan Item</label>
                  <textarea name="keterangan" class="form-control"></textarea>
              </div> 

              <div class="form-group">
                  <label>Banyak Item</label>
                	<input type="text" class="form-control" name="qty">
              </div> 
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Item</button>
               
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
       <td>File Proposal</td>
       <td>:</td>
       <td>
         <a href="form/proker/file/proposal/<?php echo $d_proker['proposal'] ?>" target="_blank">Lihat Proposal</a>
       </td>
     </tr>
   <tr>
      <td>Status</td>
     <td>:</td>
     <td>[<?php echo $d_proker['status'] ?>] <?php echo $status_proker[$d_proker['status']] ?></td>
   </tr>
   <?php if ($status >= 1) { ?>
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

    <?php    
    ?>

    <?php if ($status==11 || $status==12) { 
    $q_laporan = mysqli_query($conn, "SELECT * from laporan_proker where id_proker='$id_proker'");
    $j_laporan = mysqli_num_rows($q_laporan);
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
       <td>
       <?php  
       if($j_laporan=='0') {
         echo "Belum upload file pendukung";
       }else{
        ?>
         <a href="form/proker/file/laporan/<?php echo $d_laporan['file'] ?>" target="_blank">Lihat file pendukung</a>
       <?php  } ?>
       </td>
     </tr>
    <?php  }  
   } ?>
 </table>
 <hr>
<?php if ($status>=3 && $status!=4) { ?>
<div class="box-header with-border">
  <h3 class="box-title">RAB & RAK</h3>
</div>
 <?php
 // if ($bidang==3) {
 //   $q_detail_proker = mysqli_query($conn, "SELECT dp.*, 
 //      pp.id_pendistribusian, pp.keterangan_pendistribusian, pp.biaya_satuan, pp.disetujui, pp.catatan_bidang, pp.id_bidang_terlibat,pp.file_support as dokumen,
 //      b.nama_bidang from detail_proker dp 
 //      left join pendistribusian_proker pp on dp.id_detail_proker = pp.id_detail_proker
 //      left join bidang b on pp.id_bidang_terlibat=b.id_bidang
 //    where pp.id_bidang_terlibat='$bidang' and dp.id_proker='$id_proker'");
 // }else{

    $q_detail_proker = mysqli_query($conn, "SELECT dp.*, 
    	pp.id_pendistribusian, pp.keterangan_pendistribusian, pp.biaya_satuan, pp.disetujui, pp.catatan_bidang, pp.id_bidang_terlibat, pp.id_data_support,pp.file_support as dokumen,
      pp.qty_sapras,
    	sp.nama_sapras,
    	b.nama_bidang from detail_proker dp 
    	left join pendistribusian_proker pp on dp.id_detail_proker = pp.id_detail_proker
    	left join bidang b on pp.id_bidang_terlibat=b.id_bidang
    	left join sarana_prasarana sp on pp.id_data_support=sp.id_sapras
    where dp.id_proker='$id_proker'");
 // }
     ?>

<table class="table">
  <thead>
    <tr>
      <td>No</td>
      <td>Item</td>
      <td>Keterangan</td>
      <td>Qty Diusulkan</td>
      <td>Bidang Terlibat</td>
      <td>Biaya Satuan</td>
      <td>Total</td>
      <td>Disetujui</td>
      <td>Status</td>
      <td>Option</td>
    </tr>
  </thead>



  <tbody>
  	<?php 
  	$no = 1;
  	$status_detail_proker = [
  		'Menunggu Pendistribusian',
  		'Pengecekan Bidang Terlibat',
  		'Ditolak ', // jika bidang terlibat menolak
  		'Disetujui' // ACC Anggaran
  	];
  	while ($d_detail_proker=mysqli_fetch_array($q_detail_proker)) { 
  		if ($d_detail_proker['id_bidang_terlibat']==$bidang && $status==6) {
  			$tanda_milik_bidang = "background :  #edfbe2 ";
  		}else{
  			$tanda_milik_bidang = "";
  		}

  		?>

    <tr style="<?php echo $tanda_milik_bidang ?>">
      <td><?php echo $no++ ?></td>
      <td><?php echo $d_detail_proker['item'] ?></td>
      <td><?php echo $d_detail_proker['keterangan'] ?></td>
      <td><?php echo $d_detail_proker['qty'] ?></td>

      <td><?php echo $d_detail_proker['nama_bidang'] ?></td>
      <td>
      	<?php echo $d_detail_proker['id_bidang_terlibat']==3 ? number_format($d_detail_proker['biaya_satuan']) : '-' ?>
      		
	</td>
      <td>
      	<?php 
      	if ($d_detail_proker['id_bidang_terlibat']==3) {
      		$total_di_distribusikan = number_format($d_detail_proker['qty'] * $d_detail_proker['biaya_satuan']);
      	}
      	elseif ($d_detail_proker['id_bidang_terlibat']==6) {
      		$total_di_distribusikan = $d_detail_proker['qty'].' Unit '.$d_detail_proker['nama_sapras'];
      	}else{
      		$total_di_distribusikan = "";
		}   
		echo $total_di_distribusikan;   		
      	 ?>
      </td>
      <td>
      	<?php 
      	if ($d_detail_proker['id_bidang_terlibat']==3) {
      		$disetujui_bidang = $d_detail_proker['disetujui'].'<br>';
      		// $disetujui_bidang = number_format($d_detail_proker['disetujui']).'<br>';
      		
      	}
      	elseif ($d_detail_proker['id_bidang_terlibat']==6) {
      		$disetujui_bidang = $d_detail_proker['disetujui'].' Unit <br>';
      		
      	}else{
      		$disetujui_bidang = "";
		}   



		if ($d_detail_proker['status']==3) {
			if ($d_detail_proker['dokumen']=='') {
	  			$tampilkan_file ='';
			}else{
      			$tampilkan_file = '<a href="#"  data-toggle="modal" data-target="#lihat_file_acc_'.$d_detail_proker['id_detail_proker'].'">Lihat File</a>';
			}
  		}else{
  			$tampilkan_file ='';
  		}
		echo $disetujui_bidang.$tampilkan_file;   		
      	 ?>

      </td>
      <td><?php echo @$status_detail_proker[$d_detail_proker['status']] ?> <br><?php echo $d_detail_proker['catatan_bidang'] ?></td>
      <td>
      	
		<?php if ($bidang==$bidang_pengusul && ($status==3 || $status==9)) { ?>
		<a href="#" class="btn btn-warning btn-xs"  data-toggle="modal" data-target="#edit_item_<?php echo $d_detail_proker['id_detail_proker'] ?>">Edit</a>
		<a href="form/proker/hapus_detail_proker.php?id=<?php echo $d_detail_proker['id_detail_proker'] ?>&id_proker=<?php echo $id_proker ?>&menu=<?php echo $menu ?>&bidang_pengusul=<?php echo $bidang_pengusul ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
	<?php } 
	elseif ($bidang==5 && ($status==5 || $status==7)) { 
		if ($d_detail_proker['id_pendistribusian']=="") { ?>
			<a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#pilih_bidang_<?php echo $d_detail_proker['id_detail_proker'] ?>">Distribusikan</a>
				
		<?php }
		else{?>
			<a href="#" class="btn btn-default btn-xs"  data-toggle="modal" data-target="#pilih_bidang_<?php echo $d_detail_proker['id_detail_proker'] ?>">Edit Distribusikan</a>
		
	<?php }
	}
	elseif ($bidang==$d_detail_proker['id_bidang_terlibat'] && ($status==6) && $d_detail_proker['status']=='1') { ?>
		<a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#keputusan_bidang_terlibat_<?php echo $d_detail_proker['id_detail_proker'] ?>">Keputusan Bidang</a>
		
	<?php } ?>
      </td>
    </tr>



<form action="form/proker/simpanedit_detail_proker.php?id_detail_proker=<?php echo $d_detail_proker['id_detail_proker'] ?>&id_proker=<?php echo $id_proker ?>" method="post" enctype="multipart/form-data">
<div class="modal fade" id="edit_item_<?php echo $d_detail_proker['id_detail_proker'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Item Detail Proker</h4>
              </div>
              <div class="modal-body">
                  
              <div class="form-group">
                  <label>Item</label>
                	<input type="text" class="form-control" name="item" value="<?php echo $d_detail_proker['item'] ?>">
                	<input type="hidden" class="form-control" name="id_bidang" value="<?php echo $bidang ?>">
                	<input type="hidden" class="form-control" name="menu" value="<?php echo $menu ?>">
              </div> 
              <div class="form-group">
                  <label>Keterangan Item</label>
                  <textarea name="keterangan" class="form-control"><?php echo $d_detail_proker['keterangan'] ?></textarea>
              </div> 

              <div class="form-group">
                  <label>Banyak Item</label>
                	<input type="text" class="form-control" name="qty" value="<?php echo $d_detail_proker['qty'] ?>">
              </div> 
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Item</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>



<div class="modal fade" id="lihat_file_acc_<?php echo $d_detail_proker['id_detail_proker'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">File Support</h4>
              </div>
              <div class="modal-body">
              <?php 
              $file_dokumen = $d_detail_proker['dokumen'];
				$x = explode('.', $file_dokumen);
				$ekstensi = strtolower(end($x));
				if ($ekstensi=='jpeg' || $ekstensi=='jpg' || $ekstensi=='png') { ?>
	              <img src="form/proker/file/acc_distribusi/<?php echo $d_detail_proker['dokumen'] ?>" width="100%" alt="<?php echo $d_detail_proker['dokumen'] ?>"	>    
				<?php }else{?>
	              <iframe src="form/proker/file/acc_distribusi/<?php echo $d_detail_proker['dokumen'] ?>" width="100%" height="400px"></iframe>    
              	<?php } ?>
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>






<div class="modal fade" id="pilih_bidang_<?php echo $d_detail_proker['id_detail_proker'] ?>">
<form action="form/proker/simpanedit_pendistribusian_proker.php" method="post" enctype="multipart/form-data">
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
                	<input type="text" class="form-control" name="item" value="<?php echo $d_detail_proker['item'] ?>" readonly>
                	<input type="hidden" class="form-control" name="id_detail_proker" value="<?php echo $d_detail_proker['id_detail_proker'] ?>">
                	<input type="hidden" class="form-control" name="id_proker" value="<?php echo $d_detail_proker['id_proker'] ?>">
                	<input type="hidden" class="form-control" name="menu" value="<?php echo $menu ?>">
                	<input type="hidden" class="form-control" name="bidang_pengusul" value="<?php echo $bidang_pengusul ?>">
              </div> 
              <div class="form-group">
                  <label>Keterangan Item</label>
                  <textarea class="form-control" readonly><?php echo $d_detail_proker['keterangan'] ?></textarea>
              </div> 

              <div class="form-group">
                  <label>Banyak Item</label>
                	<input type="text" class="form-control" name="qty" value="<?php echo $d_detail_proker['qty'] ?>" readonly>
              </div>
              <div class="form-group">
                  <label>Distribusikan Ke</label>
                  <select  name="bidang_terlibat" class="form-control" id="bidang_terlibat_<?php echo $d_detail_proker['id_detail_proker'] ?>">
                    <!-- <option value="">Tidak ada bidang terlibat</option> -->
                    <?php 
                      $q_bidang = mysqli_query($conn, "SELECT * from bidang where id_bidang not in ('5')");
                      while ($d_bidang = mysqli_fetch_array($q_bidang)) { ?>
                        <option value="<?php echo $d_bidang['id_bidang'] ?>" <?php if($d_bidang['id_bidang']==$d_detail_proker['id_bidang_terlibat']){echo "selected";} ?>><?php echo $d_bidang['nama_bidang'] ?></option>
                      <?php } ?>
                  </select>
              </div> 
              <div class="form-group" id="f_keterangan">
                  <label>Keterangan Pendistribusian</label>
                  <textarea name="keterangan" class="form-control" ><?php echo $d_detail_proker['keterangan']?></textarea>
              </div> 
               <div class="form-group f_sapras_<?php echo $d_detail_proker['id_detail_proker'] ?>" <?php if($d_detail_proker['id_bidang_terlibat']!=6){echo 'hidden="true"';} ?>>
                  <label>Sarana Dan Prasarana</label>
                  <select  name="sarana_prasarana" class="form-control">
                  <?php 
                      $q_sapras = mysqli_query($conn, "SELECT * from sarana_prasarana");
                      while ($d_sapras = mysqli_fetch_array($q_sapras)) { ?>
                        <option value="<?php echo $d_sapras['id_sapras'] ?>"><?php echo $d_sapras['nama_sapras'] ?></option>
                      <?php } ?>
                  </select>
              </div> 
               <div class="form-group" hidden="true">
                  <label>Banyak yand dibutuhkan</label>
                  <input type="number" class="form-control" name="qty_sapras" value="<?php echo $d_detail_proker['qty'] ?>" >
              </div> 
              <div class="form-group" id="f_biaya_satuan_<?php echo $d_detail_proker['id_detail_proker'] ?>" <?php if($d_detail_proker['id_bidang_terlibat']!=3){echo 'hidden="true"';} ?>>
                  <label>Biaya Satuan</label>
                  <input type="number" name="biaya" class="form-control" value="<?php echo $d_detail_proker['biaya_satuan'] ?>" >
              </div> 
             
           <script type="text/javascript">
              $('#bidang_terlibat_<?php echo $d_detail_proker['id_detail_proker'] ?>').change(function(){
                var bidang = $('#bidang_terlibat_<?php echo $d_detail_proker['id_detail_proker'] ?>').val();
                $('#f_qty_<?php echo $d_detail_proker['id_detail_proker'] ?>').hide();
                $('#f_biaya_satuan_<?php echo $d_detail_proker['id_detail_proker'] ?>').hide();
                $('.f_sapras_<?php echo $d_detail_proker['id_detail_proker'] ?>').hide();
                if (bidang==3) {
                  $('#f_qty_<?php echo $d_detail_proker['id_detail_proker'] ?>').show();
                  $('#f_biaya_satuan_<?php echo $d_detail_proker['id_detail_proker'] ?>').show();
                } 
                else if (bidang==6) {
                  $('#f_qty_<?php echo $d_detail_proker['id_detail_proker'] ?>').show();
                  $('.f_sapras_<?php echo $d_detail_proker['id_detail_proker'] ?>').show();
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





<div class="modal fade" id="keputusan_bidang_terlibat_<?php echo $d_detail_proker['id_detail_proker'] ?>">
<form action="form/proker/keputusan_pendistribusian_proker.php" method="post" enctype="multipart/form-data">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Keputusan Bidang Terlibat</h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
                  <label>Item</label>
                	<input type="text" class="form-control" name="item" value="<?php echo $d_detail_proker['item'] ?>" readonly>
                	<input type="hidden" class="form-control" name="id_detail_proker" value="<?php echo $d_detail_proker['id_detail_proker'] ?>">
                	<input type="hidden" class="form-control" name="id_proker" value="<?php echo $d_detail_proker['id_proker'] ?>">
                	<input type="hidden" class="form-control" name="menu" value="<?php echo $menu ?>">
                	<input type="hidden" class="form-control" name="bidang_pengusul" value="<?php echo $bidang_pengusul ?>">
                	<input type="hidden" class="form-control" name="bidang_terlibat" value="<?php echo $d_detail_proker['id_bidang_terlibat'] ?>">
              </div> 
              <div class="form-group">
                  <label>Keterangan Item</label>
                  <textarea class="form-control" readonly><?php echo $d_detail_proker['keterangan'] ?></textarea>
              </div> 


              <hr>
             	
             	<?php 
             	if ($d_detail_proker['id_bidang_terlibat']==3) { ?>
             		<div class="form-group">
		                  <label>Qty</label>
		                	<input type="text" class="form-control"  readonly value="<?php echo $d_detail_proker['qty'] ?>" >
		              </div>
             		<div class="form-group">
		                  <label>Biaya Satuan</label>
		                	<input type="text" class="form-control" readonly value="<?php echo number_format($d_detail_proker['biaya_satuan']) ?>" >
		              </div>
             		<div class="form-group">
		                  <label>Total Biaya</label>
		                	<input type="text" class="form-control" readonly value="<?php echo $total_di_distribusikan ?>" >
		              </div>
             	<?php }else if ($d_detail_proker['id_bidang_terlibat']==6) { ?>
             	<div class="form-group">
		                  <label>Sarana Prasarana Di Butuhkan</label>
		                	<input type="text" class="form-control" value="<?php echo $d_detail_proker['nama_sapras'] ?>" readonly>
		              </div>
               <div class="form-group" >
                  <label>Banyak yand dibutuhkan</label>
                  <input type="number" class="form-control" name="qty_sapras" value="<?php echo $d_detail_proker['qty'] ?>" readonly>
              </div> 
             	<?php }	 ?>
               
              <div class="form-group">
                  <label>Keputusan Bidang</label>
                  <select  name="keputusan" class="form-control" id="keputusan_bidang_<?php echo $d_detail_proker['id_detail_proker'] ?>">
                    <?php 
                    if ($d_detail_proker['id_bidang_terlibat']==6) {
                      $id_sapras = $d_detail_proker['id_data_support'];
                      $q_sapras = mysqli_query($conn, "SELECT stok, (SELECT sum(dipinjamkan) from peminjaman where id_sapras='$id_sapras' and status='0') as dipinjam from sarana_prasarana where id_sapras='$id_sapras'")or die(mysqli_error());
                      $d_sapras = mysqli_fetch_array($q_sapras);
                      $sapras_tersedia = $d_sapras['stok'] - $d_sapras['dipinjam'];
                      if ($d_detail_proker['qty_sapras'] >$sapras_tersedia ) {
                           $status_distribusi = [
                            2=> 'Tolak (Prasarana kurang)', 
                          ];
                        
                      }else{
                        $status_distribusi = [
                          2=> 'Tolak ', // jika bidang terlibat menolak
                          3=>'Setujui',
                        ];                      }
                    }else{
                      $status_distribusi = [
          				  		2=> 'Tolak ', // jika bidang terlibat menolak
          				  		3=>'Setujui',
          				  	];

                    }
                      foreach ($status_distribusi as $k => $v) { ?>
                        <option value="<?php echo $k ?>"><?php echo $v ?></option>
                      <?php } ?>
                  </select>
              </div> 


             	<?php 
             	if ($d_detail_proker['id_bidang_terlibat']==3) { ?>
             		<div id="f_distribusi_disetujui_<?php echo $d_detail_proker['id_detail_proker'] ?>" hidden="true">
             			<div class="form-group">
		                  <label>Biaya Di Setujui</label>
		                	<input type="text" class="form-control" name="disetujui"  required >
		              </div>
             			
		          </div>
             	<?php }else if ($d_detail_proker['id_bidang_terlibat']==6) { ?>
             	
             	<div hidden="true">
             		<div class="form-group">
		                  <label>Banyak Sarana Prasarana Di Setujui</label>
		                	<input type="text" class="form-control" name="disetujui" value="<?php echo $d_detail_proker['qty'] ?>">
		              </div>
             		
		          </div>
             	<?php }	 ?>

             	<div class="form-group f_distribusi_disetujui_<?php echo $d_detail_proker['id_detail_proker'] ?>"  hidden="true">
		                  <label>File Pendukung</label>
		                	<input type="file" name="file">
		              </div>
              <div class="form-group" id="f_keterangan">
                  <label>Catatan</label>
                  <textarea name="catatan" class="form-control" ></textarea>
              </div> 
              
			 <script type="text/javascript">
              $('#keputusan_bidang_<?php echo $d_detail_proker['id_detail_proker'] ?>').change(function(){
                var keputusan = $('#keputusan_bidang_<?php echo $d_detail_proker['id_detail_proker'] ?>').val();
                  // $('#f_distribusi_disetujui_<?php echo $d_detail_proker['id_detail_proker'] ?>').hide();
                if (keputusan==3) {
                  $('#f_distribusi_disetujui_<?php echo $d_detail_proker['id_detail_proker'] ?>').show();
                  $('.f_distribusi_disetujui_<?php echo $d_detail_proker['id_detail_proker'] ?>').show();
                } 
                else {
                  $('#f_distribusi_disetujui_<?php echo $d_detail_proker['id_detail_proker'] ?>').hide();
                  $('.f_distribusi_disetujui_<?php echo $d_detail_proker['id_detail_proker'] ?>').hide();
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
  	<?php } ?>
    
  </tbody>
</table>

<?php }// akhir dari if($status>=3) ?>
