<?php 
include "../../../../assets/koneksi.php";

$id_proker=$_POST['id_proker'];
$keputusan=$_POST['keputusan'];
$catatan=nl2br($_POST['catatan']);
	$q1=mysqli_query($conn, "UPDATE proker set 
		 status='$keputusan'
		 where id_proker = '$id_proker'
		")or die(mysqli_error()); 

		$q2 =mysqli_query($conn, "INSERT into komentar_proker set 
		id_proker='$id_proker', status='$keputusan', catatan='$catatan'
		");

?>

	<script type="text/javascript">
		alert('Data proker berhasil diperbaharui');
		window.location.href="../../?a=proker"

	</script>
