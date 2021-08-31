<?php 
include "../../../../assets/koneksi.php";

$nama=$_POST['nama'];
	$q1=mysqli_query($conn, "INSERT into bidang set 
		
		
		  
		 nama_bidang='$nama'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data bidang berhasil disimpan');
		window.location.href="../../?a=bidang"

	</script>
