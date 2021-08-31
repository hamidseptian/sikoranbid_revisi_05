<?php 
include "../../../../assets/koneksi.php";

$id_proker=$_POST['id_proker'];
$nama_bidang=$_POST['nama_bidang'];
$id_bidang=$_POST['id_bidang'];
$bidang_terlibat=$_POST['bidang_terlibat'];
$keterangan=nl2br($_POST['keterangan']);
$qty=$_POST['qty'];
$biaya=$_POST['biaya'];
$sarana_prasarana=$_POST['sarana_prasarana'];
	$q1=mysqli_query($conn, "INSERT into detail_proker set 
		
		
		  
		   id_proker='$id_proker',
		   id_bidang_terlibat='$bidang_terlibat',
		   keterangan='$keterangan',
		   qty='$qty',
		   biaya_diusulkan='$biaya',
		   id_sapras ='$sarana_prasarana'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data detail proker berhasil disimpan');
		window.location.href="../../?a=detail_proker&id=<?php echo $id_proker ?>&bidang=<?php echo $nama_bidang ?>&id_bidang=<?php echo $id_bidang ?>"

	</script>
