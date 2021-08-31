
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "DELETE from bidang where id_bidang='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data bidang dihapus');
		window.location.href="../../?a=bidang"

	</script>