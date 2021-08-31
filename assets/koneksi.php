<?php 
  // $conn = mysqli_connect('sql303.epizy.com','epiz_28921715','FxNMep72EK','epiz_28921715_sikoranbid');
  $conn = mysqli_connect('localhost','root','','sikoranbid');
  date_default_timezone_set('Asia/Jakarta');
  error_reporting(0);
  $namabulan = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
        );
 ?>