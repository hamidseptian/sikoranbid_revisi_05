
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "DELETE from muzaki where id_muzaki='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data muzaki dihapus');
		window.location.href="../../?a=muzaki"

	</script>