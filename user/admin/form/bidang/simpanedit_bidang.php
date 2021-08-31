<?php 
include "../../../../assets/koneksi.php";

$id=$_POST['id'];
$nama=$_POST['nama'];

	$q1=mysqli_query($conn, "UPDATE bidang set 
		
		
		 nama_bidang='$nama'
		 where id_bidang = '$id'
		
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data bidang  berhasil diperbaharui');
		window.location.href="../../?a=bidang"

	</script>
