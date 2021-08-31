<?php 
include "../../../../assets/koneksi.php";

$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$nohp=$_POST['nohp'];
$jenis=$_POST['jenis'];
	$q1=mysqli_query($conn, "INSERT into petugas_pengumpul set 
		
		
		  
		  nama='$nama',
		 alamat='$alamat',
		 nohp='$nohp',
		 jenis ='$jenis'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data petugas pengumpul berhasil disimpan');
		window.location.href="../../?a=petugas_pengumpul"

	</script>
