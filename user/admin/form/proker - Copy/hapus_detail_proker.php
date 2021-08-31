
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];
$id_proker=$_GET['id'];

	
	$q1=mysqli_query($conn, "DELETE from detail_proker where id_detail_proker='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data detail proker dihapus');
		window.location.href="../../?a=detail_proker&id=4&bidang=Bidang Pengumpulan&id_bidang=2"

	</script>