
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "DELETE from kotak_infaq where id_kotak='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data kotak infaq dihapus');
		window.location.href="../../?a=kotak_infaq"

	</script>