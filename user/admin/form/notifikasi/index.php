<?php 

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
$nama_bidang = $level;
$q1=mysqli_query($conn, "SELECT dp.*, 
    	pp.id_pendistribusian, pp.keterangan_pendistribusian, pp.biaya_satuan, pp.disetujui, pp.catatan_bidang, pp.id_bidang_terlibat,
    	p.nama_proker, p.status as status_proker, p.id_bidang as id_bidang_pengusul,
    	b.nama_bidang from detail_proker dp 
    	left join pendistribusian_proker pp on dp.id_detail_proker = pp.id_detail_proker
        left join proker p on dp.id_proker = p.id_proker
    	left join bidang b on pp.id_bidang_terlibat=b.id_bidang
    where pp.id_bidang_terlibat='$bidang'
  and p.status>=5  
  group by p.id_proker order by p.id_proker desc ");
 ?>
<div class="box-header with-border">
  <h3 class="box-title">Notifikasi <small><?php echo $nama_bidang ?></small></h3>

</div>

<hr>
<?php 
  
  $no=1;
 ?>
<div class="box-body" style="overflow-x:scroll;">
   <table class="table table-striped table-bordered" id="example1">
      <thead>
        <tr>
          <td>No</td>
          <td>Bidang</td>
          <td>Nama Proker</td>
          <td>Keterangan</td>
          <td>Status</td>
          <td>Option</td>
        </tr>
      </thead>
    <?php 
    while ($d1=mysqli_fetch_array($q1)) { 
      ?>
    <tr>
      <td><?php echo $no++ ?></td>
     
    
      
      <td><?php echo $d1['nama_bidang'] ?></td>
      <td><?php echo $d1['nama_proker'] ?></td>
      <td><?php echo $d1['keterangan'] ?></td>
      <td><?php echo $status_proker[$d1['status_proker']] ?></td>

      <td>
        <a href="?a=detail_proker&id=<?php echo $d1['id_proker'] ?>&menu=notifikasi&bidang_pengusul=<?php echo $d1['id_bidang_pengusul'] ?>" class="btn btn-info btn-xs">Detail</a>    
      </td>
    </tr>
    <?php } ?>
  </table>
</div>