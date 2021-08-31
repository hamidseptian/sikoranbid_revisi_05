<?php

include "../../../../assets/koneksi.php";
require_once("../../../../assets/dompdf/src/Autoloader.php");
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];


$waktu = $namabulan[$bulan].' '.$tahun;
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

    $q1=mysqli_query($conn, "SELECT * from pendistribusian_proker p 
      left join bidang b on p.id_bidang_terlibat = b.id_bidang 
      left join detail_proker dp on p.id_detail_proker = dp.id_detail_proker

      where year(p.tanggal)='$tahun' and month(p.tanggal)='$bulan' 
      and dp.status=3
      ")or die(mysqli_error());
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
Laporan Pendistribusian <br> Bulan '.$waktu.'
</center
</p>



<table style=" font-size:11px;border-collapse: collapse; width: 100%;" border=1>
 <thead>
       <tr>
          <td>No</td>
          <td>Item</td>
          <td>Kebutuhan</td>
          <td>Keterangan Kebutuhan</td>
          <td>Distribusikan Ke</td>
          <td>Disetujui</td>
       
        </tr>
    </thead>
               
';









    $no=1;
     $persen = 100 / 12;
    while ($d1=mysqli_fetch_array($q1)) { 
       $bidang_terlibat = $d1['id_bidang_terlibat'];
      $kebutuhan = [
        1=>'',
        2=>'',
        3=>'Rp. '.$d1['qty'],
        4=>$d1['qty'],
        5=>$d1['qty'],
        6=>$d1['qty'].' Unit',
      ];
     
      $disetujui = [
        1=>'',
        2=>'',
        3=>'Rp. '.$d1['disetujui'],
        4=>$d1['disetujui'],
        5=>$d1['disetujui'],
        6=>$d1['disetujui'].' Unit',
      ];
     
     $show_kebutuhan = $kebutuhan[$bidang_terlibat];
     $show_disetujui = $disetujui[$bidang_terlibat];
     
    $html.='<tr>
      <td>'.$no++.'</td>
     
    
      
      <td>'.$d1['item'].'</td>
      <td>'.$show_kebutuhan.'</td>
      <td>'.$d1['keterangan'].'</td>
      <td>'.$d1['nama_bidang'].'</td>
      <td>'.$show_disetujui.'</td>
    

    </tr>';
}
$html .= '
</table>';

$dompdf = new Dompdf();
// $customPaper = array(0,0,200,360);
// $dompdf->set_paper($customPaper);
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream('Laporan Data Proker.pdf', ['Attachment'=>0]);

?>
<p style="font-size: "></p>

