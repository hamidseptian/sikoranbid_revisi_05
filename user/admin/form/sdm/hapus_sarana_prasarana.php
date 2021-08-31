
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "DELETE from sarana_prasarana where id_sapras='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data sarana prasarana dihapus');
		window.location.href="../../?a=sarana_prasarana"

	</script>