<?php 
include "../../../../assets/koneksi.php";

$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$nohp=$_POST['nohp'];
// $jenis=$_POST['jenis'];
// $donasi=$_POST['donasi'];
	$q1=mysqli_query($conn, "INSERT into muzaki set 
		
		
		  
		  nama='$nama',
		 alamat='$alamat',
		 nohp='$nohp'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data muzaki berhasil disimpan');
		window.location.href="../../?a=muzaki"

	</script>
