
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];
$status=$_GET['status'];
  $ket_status = ['Pengecekan','Disetujui','Ditolak'];
  $show_status = $ket_status[$status];
	$q1=mysqli_query($conn, "UPDATE pengumpulan set status='$status' where id_pengumpulan='$id'") or die(mysqli_error()); 

if ($status==1) {
		# code...
	}	
?>

	<script type="text/javascript">
		alert('Data pengumpulan <?php echo $show_status ?>');
		window.location.href="../../?a=pengumpulan"

	</script>