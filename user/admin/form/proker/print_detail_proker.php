<?php

include "../../../../assets/koneksi.php";
require_once("../../../../assets/dompdf/src/Autoloader.php");
Dompdf\Autoloader::register();
use Dompdf\Dompdf;

$id_proker = $_GET['id'];



$status_proker = [
  'Diusulkan', // 0
  'ACC Pendayagunaan', // 1
  'Revisi Pendayagunaan', // 2
  'ACC KP Dan Persiapan ', // 3 jika sudah di acc Pendayagunaan
  'Revisi KP', // 4
  'Pendistribusian', // 5 admin ditribusi melakukan pemilihan bidang lain terkait kebutuhan proker. jika sudah di distribusikan apakah bisa di edit lagi itemnya.?
  'Menunggu keputusan bidang terlibat', // 6 perbaikan item dilakukan oleh pengusul jika ada bidang yang menolak pendistribusian. jika selesai status kembali pada 5
  'Perbaikan Item', // 7 perbaikan item dilakukan oleh pengusul jika ada bidang yang menolak pendistribusian. jika selesai status kembali pada 5
  'Pengecekan kembali bidang pengusul', // 8 pada banding ini kegiatan sama dengan persiapan tapi status banding. ketika selesai banding maka kembali pada status 5
  'Banding', // 9 pada banding ini kegiatan sama dengan persiapan tapi status banding. ketika selesai banding maka kembali pada status 5
  'Pelaksanaan Proker', // 10
  'Laporan Dan Evaluasi', // 11
  'Selesai', // 12
  99=>'Di Tolak'];

$q1=mysqli_query($conn, "SELECT * from proker p left join bidang b on p.id_bidang = b.id_bidang where id_proker='$id_proker'");
$d1=mysqli_fetch_array($q1);
$bidang=$d1['id_bidang'];
$status=$d1['status'];
  $no=1;
     $persen = 100 / 12;
   
      $id_proker = $d1['id_proker'];
      $q_laporan = mysqli_query($conn, "SELECT * from laporan_proker where id_proker='$id_proker'");
      $d_laporan = mysqli_fetch_array($q_laporan);


$html = '

<div style="width: 100px;float: left; margin-right:10px">
  <img src="../../../../assets/logo.jpg" style="width: 100px;">
</div>

<div style="width: 610px; float:left;margin-top:-20px;">
 
   <center>
    <h3>
     BAZNAS Kota  Padang
    </h3>
      <p style="font-size:12px; margin-top:-15px">
Jl. By Pass No.KM, Sungai Sapih, Kec. Kuranji, Kota Padang, Sumatera Barat 25176</p>
</center>


</div>

<div style="clear:both;"></div>
<hr>

<center>
<p style="margin-top:-5px; font-size:15px">
Laporan Detail Proker <br>'.$d1['nama_proker'].'
</center
</p>



<table style=" font-size:11px;border-collapse: collapse; width: 100%;" >
      <tr>
        <td width="100px">Bidang Pengusul</td>
        <td width="10px">:</td>
        <td>'.$d1['nama_bidang'].'</td>
      </tr>
      <tr>
        <td>Kategori</td>
        <td>:</td>
        <td>'.$d1['kategori'].'</td>
      </tr>
      <tr>
        <td>Program Kerja</td>
        <td>:</td>
        <td>'.$d1['nama_proker'].'</td>
      </tr>
      <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td>'.$d1['keterangan'].'</td>
      </tr>
      <tr>
        <td>Status</td>
        <td>:</td>
        <td>'.round($d1['status'] * $persen, 2).' % <br>  '.$status_proker[$d1['status']].'</td>
      </tr>
      <tr>
        <td>Laporan</td>
        <td>:</td>
        <td>'.$d_laporan['laporan'].'</td>
      </tr>
      <tr>
        <td>Evaluasi</td>
        <td>:</td>
        <td>'.$d_laporan['evaluasi'].'</td>
      </tr>
  
               
';
$html .= '
</table>';
$html .= '
<h5 class="box-title">RAB & RAK</h5>';
$q_detail_proker = mysqli_query($conn, "SELECT dp.*, 
      pp.id_pendistribusian, pp.keterangan_pendistribusian, pp.biaya_satuan, pp.disetujui, pp.catatan_bidang, pp.id_bidang_terlibat,pp.file_support as dokumen,
      sp.nama_sapras,
      b.nama_bidang from detail_proker dp 
      left join pendistribusian_proker pp on dp.id_detail_proker = pp.id_detail_proker
      left join bidang b on pp.id_bidang_terlibat=b.id_bidang
      left join sarana_prasarana sp on pp.id_data_support=sp.id_sapras
    where dp.id_proker='$id_proker'");
$html .= '
<table  style=" font-size:11px;border-collapse: collapse; width: 100%;" border=1>
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
    </tr>
  </thead>

';


  $no = 1;
    $status_detail_proker = [
      'Menunggu Pendistribusian',
      'Pengecekan Bidang Terlibat',
      'Ditolak ', // jika bidang terlibat menolak
      'Disetujui' // ACC Anggaran
    ];
    while ($d_detail_proker=mysqli_fetch_array($q_detail_proker)) { 
    

    $html .='<tr>
      <td>'.$no++.'</td>
      <td>'.$d_detail_proker['item'].'</td>
      <td>'.$d_detail_proker['keterangan'].'</td>
      <td>'.$d_detail_proker['qty'].'</td>

      <td>'.$d_detail_proker['nama_bidang'].'</td>
      <td>'.($d_detail_proker['id_bidang_terlibat']==3 ? number_format($d_detail_proker['biaya_satuan']) : '-').'</td>
   ';



      $html .='<td>';
       
        if ($d_detail_proker['id_bidang_terlibat']==3) {
          $total_di_distribusikan = number_format($d_detail_proker['qty'] * $d_detail_proker['biaya_satuan']);
        }
        elseif ($d_detail_proker['id_bidang_terlibat']==6) {
          $total_di_distribusikan = $d_detail_proker['qty'].' Unit '.$d_detail_proker['nama_sapras'];
        }else{
          $total_di_distribusikan = "";
    }   
          
         
      $html .=$total_di_distribusikan.'</td>';

      $html .='<td>';
       
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
      
      $html .=$disetujui_bidang.'</td>';
      $html .='<td>'.@$status_detail_proker[$d_detail_proker['status']].'<br>'.$d_detail_proker['catatan_bidang'].'</td>';




    $html .='
      </tr>';
     
      // -------------------otak Infak 

}

$html .= '

</table>';

$dompdf = new Dompdf();
// $customPaper = array(0,0,200,360);
// $dompdf->set_paper($customPaper);
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream('Laporan Detail Proker.pdf', ['Attachment'=>0]);

?>
<p style="font-size: "></p>

