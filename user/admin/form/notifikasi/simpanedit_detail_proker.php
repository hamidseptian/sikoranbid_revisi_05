<?php 
include "../../../../assets/koneksi.php";

$item=$_POST['item'];
$biaya=$_POST['biaya'];
$qty=$_POST['qty'];
$id=$_POST['id'];
$id_proker=$_POST['id_proker'];
$nama_bidang=$_POST['nama_bidang'];
$id_bidang=$_POST['id_bidang'];
	$q1=mysqli_query($conn, "UPDATE detail_proker set 
		
		
		  
		   
		  item='$item',
		  qty='$qty',
		  biaya_satuan ='$biaya'
		  where id_detail_proker='$id'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data detail proker berhasil disimpan');
		window.location.href="../../?a=detail_proker&id=<?php echo $id_proker ?>&bidang=<?php echo $nama_bidang ?>&id_bidang=<?php echo $id_bidang ?>"

	</script>
