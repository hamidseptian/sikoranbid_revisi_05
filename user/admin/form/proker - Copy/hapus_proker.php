
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "DELETE from proker where id_proker='$id'") or die(mysqli_error()); 
	$q1=mysqli_query($conn, "DELETE from detail_proker where id_proker='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data Proker dihapus');
		window.location.href="../../?a=proker"

	</script>