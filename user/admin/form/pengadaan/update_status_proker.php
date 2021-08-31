
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id_proker'];
$metode=$_GET['metode'];

if ($metode==1) {
	$status=$_GET['status'];
	$q1=mysqli_query($conn, "UPDATE proker set status='$status' where id_proker='$id'") or die(mysqli_error()); 

}
elseif ($metode==2 || $metode==3) {
	$status=$_POST['status'];
	$catatan=nl2br($_POST['catatan']);
	$q1=mysqli_query($conn, "UPDATE proker set status='$status' where id_proker='$id'") or die(mysqli_error()); 
	$q2 =mysqli_query($conn, "INSERT into komentar_proker set 
		id_proker='$id', status='$status', catatan='$catatan'
		");
}
	
if ($status==2) {
	$alert = "Proker anda sedang menunggu validasi dari Ketua Panitia";
}	
elseif ($status==3) {
	$alert = "Proker anda sedang menunggu validasi dari Ketua Panitia";
}else{
	$alert = "Unknown";
}
?>

	<script type="text/javascript">
		alert('<?php echo $alert ?>');
		window.location.href="../../?a=proker"

	</script>