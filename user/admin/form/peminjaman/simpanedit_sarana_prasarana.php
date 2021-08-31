<?php 
include "../../../../assets/koneksi.php";

$id=$_POST['id'];
$nama=$_POST['nama'];
$ket=nl2br($_POST['ket']);
$banyak=$_POST['banyak'];
	$q1=mysqli_query($conn, "UPDATE sarana_prasarana set 
		
		
		  
		 nama_sapras='$nama',
		 keterangan='$ket',
		 stok='$banyak'
		 where id_sapras='$id'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data sarana prasarana berhasil disimpan');
		window.location.href="../../?a=sarana_prasarana"

	</script>
