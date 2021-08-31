<?php 
include "../../../../assets/koneksi.php";

$id_proker=$_GET['id_proker'];
$id_detail_proker=$_GET['id_detail_proker'];
$menu=$_POST['menu'];
$id_bidang=$_POST['id_bidang'];
$item=$_POST['item'];
$keterangan=nl2br($_POST['keterangan']);
$qty=$_POST['qty'];
	$q1=mysqli_query($conn, "UPDATE detail_proker set 
		
		  
		   item='$item',
		   id_proker='$id_proker',
		   keterangan='$keterangan',
		   qty='$qty',
		   status='0'
		  where id_detail_proker='$id_detail_proker'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data detail proker berhasil diperbaharui');
		window.location.href="../../?a=detail_proker&id=<?php echo $id_proker ?>&menu=<?php echo $menu ?>&bidang_pengusul=<?php echo $id_bidang ?>"

	</script>
