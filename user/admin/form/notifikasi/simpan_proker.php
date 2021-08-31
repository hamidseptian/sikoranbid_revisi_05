<?php 
include "../../../../assets/koneksi.php";

$bidang=$_POST['bidang'];
$nama_proker=$_POST['nama_proker'];
$kategori=$_POST['kategori'];
$status=$_POST['status'];
$ket=nl2br($_POST['ket']);
	$q1=mysqli_query($conn, "INSERT into proker set 
		
		
		  
		  id_bidang='$bidang',
		 kategori='$kategori',
		 nama_proker='$nama_proker',
		 keterangan='$ket',
		 status ='$status'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data proker berhasil disimpan');
		window.location.href="../../?a=proker"

	</script>
