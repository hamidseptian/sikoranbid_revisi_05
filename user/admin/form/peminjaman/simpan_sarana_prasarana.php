<?php 
include "../../../../assets/koneksi.php";

$nama=$_POST['nama'];
$ket=nl2br($_POST['ket']);
$banyak=$_POST['banyak'];
	$q1=mysqli_query($conn, "INSERT into sarana_prasarana set 
		
		
		  
		 nama_sapras='$nama',
		 keterangan='$ket',
		 stok='$banyak'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data sarana prasarana berhasil disimpan');
		window.location.href="../../?a=sarana_prasarana"

	</script>
