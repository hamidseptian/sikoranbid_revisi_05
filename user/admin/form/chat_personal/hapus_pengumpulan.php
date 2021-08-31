
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "DELETE from pengumpulan where id_pengumpulan='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data pengumpulan dihapus');
		window.location.href="../../?a=pengumpulan"

	</script>