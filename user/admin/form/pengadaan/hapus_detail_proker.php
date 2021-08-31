
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];
$id_proker=$_GET['id_proker'];
$menu=$_GET['menu'];
$bidang_pengusul=$_GET['bidang_pengusul'];

	
	$q1=mysqli_query($conn, "DELETE from detail_proker where id_detail_proker='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data detail proker dihapus');
		window.location.href="../../?a=detail_proker&id=<?php echo $id_proker ?>&menu=<?php echo $menu ?>&bidang_pengusul=<?php echo $bidang_pengusul ?>"

	</script>