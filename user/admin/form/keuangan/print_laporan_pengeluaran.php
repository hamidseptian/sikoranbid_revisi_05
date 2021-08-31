<?php

include "../../../../assets/koneksi.php";
require_once("../../../../assets/dompdf/src/Autoloader.php");
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];


  $q_pengeluaran=mysqli_query($conn, "SELECT png.*, b.nama_bidang, p.nama_proker, dp.item, dp.qty as qty_diusulkan
    from pengeluaran png 
    left join detail_proker dp on png.id_detail_proker = dp.id_detail_proker
    left join proker p on dp.id_proker=p.id_proker
    left join bidang b on p.id_bidang = b.id_bidang
    where  month(png.tanggal)='$bulan' and year(png.tanggal)='$tahun' order by tanggal asc")or die(mysqli_error());


$waktu = $namabulan[$bulan].' '.$tahun;
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
Laporan Data Pengeluaran Bidang Keuangan <br> Bulan '.$waktu.'
</center
</p>



<table style=" font-size:11px;border-collapse: collapse; width: 100%;" border=1>
 <thead>
     <tr>
        <td  width="20px">No</td>
        <td width="60px">Tanggal</td>
        <td>Proker</td>
        <td>Keterangan</td>
        
        <td width="70px">Biaya</td>
      </tr>
    </thead>
               
';
$no=1;
$total = 0;
$total_semua =0;

while ($d_pengeluaran=mysqli_fetch_array($q_pengeluaran )) { 
   if ($d_pengeluaran['id_detail_proker']!='') {
        $keterangan = $d_pengeluaran['keterangan'].' Sebanyak '.$d_pengeluaran['qty_diusulkan'];
        $biaya = $d_pengeluaran['biaya'];
      }else{
        $keterangan = $d_pengeluaran['keterangan'].' Sebanyak '.$d_pengeluaran['qty'];
        $biaya = $d_pengeluaran['qty'] * $d_pengeluaran['biaya'];

      }
      $total = $biaya;
      $total_semua +=$total;

  $html .='<tr>
          <td>'.$no++.'</td>
          <td>'.$d_pengeluaran['tanggal'].'</td>
          <td>'.$d_pengeluaran['nama_proker'].'</td>
          <td>'.$keterangan.'</td>
          <td align="right">'.number_format($biaya).'</td>
        </tr>';
  }




  $html .='<tr>
    <td colspan="4">Total</td>
  
    <td  align="right">'.number_format($total_semua).'</td>

    
  </tr>';



    
$html .= '
</table>';

$dompdf = new Dompdf();
// $customPaper = array(0,0,200,360);
// $dompdf->set_paper($customPaper);
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream('Laporan Data Pengeluaran.pdf', ['Attachment'=>0]);

?>
<p style="font-size: "></p>

