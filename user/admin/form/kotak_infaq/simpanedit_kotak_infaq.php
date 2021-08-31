<?php 
include "../../../../assets/koneksi.php";

$id=$_POST['id'];
$lokasi=$_POST['lokasi'];
$alamat=$_POST['alamat'];
	$q1=mysqli_query($conn, "UPDATE  kotak_infaq set 
		
		
		  
		 lokasi='$lokasi',
		 alamat='$alamat'
		 where id_kotak = '$id'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data kotak infaq berhasil diperbaharui');
		window.location.href="../../?a=kotak_infaq"

	</script>
