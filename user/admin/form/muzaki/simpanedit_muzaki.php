<?php 
include "../../../../assets/koneksi.php";

$id=$_POST['id'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$nohp=$_POST['nohp'];
// $jenis=$_POST['jenis'];
// $donasi=$_POST['donasi'];
	$q1=mysqli_query($conn, "UPDATE muzaki set 
		
		
		  
		  nama='$nama',
		 alamat='$alamat',
		 nohp='$nohp'
		 where id_muzaki = '$id'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data muzaki berhasil diperbaharui');
		window.location.href="../../?a=muzaki"

	</script>
