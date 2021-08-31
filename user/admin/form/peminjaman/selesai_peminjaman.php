
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];
$id_sapras=$_GET['id_sapras'];
$tgls = date('Y-m-d');
	$q1=mysqli_query($conn, "UPDATE peminjaman set status='1', tgl_dikembalikan='$tgls' where id_peminjaman='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Peminjaman selesai');
		window.location.href="../../?a=detail_peminjaman&id=<?php echo 	$id_sapras ?>"

	</script>