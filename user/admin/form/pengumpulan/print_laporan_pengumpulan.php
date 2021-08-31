<?php

include "../../../../assets/koneksi.php";
require_once("../../../../assets/dompdf/src/Autoloader.php");
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];
$jenis = $_GET['jenis'];



if ($jenis!='') {
  $q1=mysqli_query($conn, "SELECT * from pengumpulan where jenis='$jenis' and status='1' and month(tgl_infaq)='$bulan' and year(tgl_infaq)='$tahun'  order by status asc, id_pengumpulan desc")or die(mysqli_error());
  $caption_jenis=$jenis;
}else{
  $q1=mysqli_query($conn, "SELECT * from pengumpulan where status='1'  and month(tgl_infaq)='$bulan' and year(tgl_infaq)='$tahun' order by status asc, id_pengumpulan desc")or die(mysqli_error());
  $caption_jenis="Semua Jenis Sumbangan";
}

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
Laporan Bidang Pengumpulan '.$caption_jenis.' <br> Bulan '.$waktu.'
</center
</p>



<table style=" font-size:11px;border-collapse: collapse; width: 100%;" border=1>
 <thead>
      <tr>
        <td width="20px">No</td>
        <td width="70px">Tanggal</td>
        <td width="100px">Jenis</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td width="70px">Jumlah</td>
       
      </tr>
    </thead>
               
';
$no=1;
$total = 0;
while ($d1=mysqli_fetch_array($q1)) { 
  $total +=$d1['jumlah'];

  $html .='<tr>
    <td>'.$no++.'</td>
    <td>'.$d1['tgl_infaq'].'<br>'.$d1['jam_infaq'].'</td>
    <td>'.$d1['jenis'].'</td>
    <td>'.$d1['nama'].'</td>
    <td>'.$d1['alamat'].'</td>
    <td align="right">'.number_format($d1['jumlah']).'</td>

    
  </tr>';
  }




  $html .='<tr>
    <td colspan="5">Total</td>
  
    <td  align="right">'.number_format($total).'</td>

    
  </tr>';



    
$html .= '
</table>';

$dompdf = new Dompdf();
// $customPaper = array(0,0,200,360);
// $dompdf->set_paper($customPaper);
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream('Laporan Data Pengumpulan.pdf', ['Attachment'=>0]);

?>
<p style="font-size: "></p>

