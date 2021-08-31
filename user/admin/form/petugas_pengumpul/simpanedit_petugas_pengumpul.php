<?php 
include "../../../../assets/koneksi.php";

$id=$_POST['id'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$nohp=$_POST['nohp'];
$jenis=$_POST['jenis'];
	$q1=mysqli_query($conn, "UPDATE petugas_pengumpul set 
		
		
		  
		  nama='$nama',
		 alamat='$alamat',
		 nohp='$nohp',
		 jenis ='$jenis'
		 where id_petugas_pengumpul = '$id'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data petugas pengumpul berhasil diperbaharui');
		window.location.href="../../?a=petugas_pengumpul"

	</script>
