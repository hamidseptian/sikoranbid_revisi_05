
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "DELETE from pengadaan where id_pengadaan='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data pengadaan dihapus');
		window.location.href="../../?a=pengadaan"

	</script>