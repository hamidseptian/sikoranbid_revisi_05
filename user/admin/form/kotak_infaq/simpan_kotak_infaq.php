<?php 
include "../../../../assets/koneksi.php";

$lokasi=$_POST['lokasi'];
$alamat=$_POST['alamat'];
	$q1=mysqli_query($conn, "INSERT into kotak_infaq set 
		
		
		  
		 lokasi='$lokasi',
		 alamat='$alamat'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data kotak infaq berhasil disimpan');
		window.location.href="../../?a=kotak_infaq"

	</script>
